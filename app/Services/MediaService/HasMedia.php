<?php

namespace App\Services\MediaService;

use App\Models\Media;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

trait HasMedia
{
    protected array $mediaCollections = [];
    protected $prefix = 'media/';

    public static function bootHasMedia()
    {
        static::registerMediaEvents();
    }

    protected static function registerMediaEvents()
    {
        $events = [
            'retrieved',
            'created',
            'creating',
            'saved',
            'saving',
            'updated',
            'updating',
            'deleted',
            'deleting'
        ];

        if (in_array(SoftDeletes::class, class_uses_recursive(static::class))) {
            $events = array_merge($events, ['restored', 'restoring', 'forceDeleted', 'forceDeleting', 'softDeleted']);
        }

        foreach ($events as $event) {
            static::$event(function ($model) {
                $model->registerMediaCollection();
            });
        }
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function addMediaCollection(string $name): self
    {
        $this->mediaCollections[$name] = [
            'name' => $name,
            'type' => 'single'
        ];
        return $this;
    }

    public function single(): self
    {
        $this->setCollectionType('single');

        return $this;
    }

    public function multiple(): self
    {
        $this->setCollectionType('multiple');
        return $this;
    }

    protected function setCollectionType(string $type): void
    {
        $lastKey = array_key_last($this->mediaCollections);
        if ($lastKey !== null) {
            $this->mediaCollections[$lastKey]['type'] = $type;
        }
    }

    public function getMediaCollection(string $collectionName = null)
    {
        return $this->media()
            ->where('collection_name', $collectionName)
            ->get()
            ->each(fn($media) => $media->url = asset($media->url));
    }

    public function getMediaCollectionUrl(string $collectionName = null)
    {
        return $this->media()
            ->where('collection_name', $collectionName)
            ->pluck('url')->map(function ($item) {
                return asset($item);
            });
    }

    public function getFirstMedia(string $collectionName = null)
    {
        return $this->media()->where('collection_name', $collectionName)->first();
    }

    public function getFirstMediaUrl(string $collectionName = null): ?string
    {
        $url = $this->media()->where('collection_name', $collectionName)->pluck('url')->first();
        return $url ? asset($url) : null;
    }

    public function addMedia($media, string $collectionName = null): void
    {
        $this->verifyMediaCollection('single', $collectionName);
        $this->updateMedia($media, $collectionName);
    }

    private function moveMedia($media, string $path, $fileId): void
    {
        $media->move(public_path($path), $fileId);
    }

    private function makeUrl(string $path, $fileId)
    {
        // return asset("{$path}/{$fileId}");
        return "{$path}/{$fileId}";
    }

    private function updateMedia($media, $collectionName): void
    {
        $uuid = Str::uuid();
        $path = $this->getPath($collectionName);
        $fileId = "{$uuid}.{$media->getClientOriginalExtension()}";
        $this->deletePreviousMedia($collectionName);
        $this->moveMedia($media, $path, $fileId);
        $url = $this->makeUrl($path, $fileId);
        $this->media()->updateOrCreate(
            ['mediable_id' => $this->id, 'mediable_type' => get_class($this), 'uuid' => $this->uuid],
            [
                'name' => $fileId,
                'uuid' => $uuid,
                'url' => $url,
                'collection_name' => $collectionName,
            ]
        );
    }

    private function deletePreviousMedia(string $collectionName = null): void
    {
        $previousMedia = $this->media()->where('collection_name', $collectionName)->first();
        if ($previousMedia) {

            $this->deleteMediaFile($previousMedia->url);
            $previousMedia->delete();
        }
    }

    private function deleteMediaFile(string $filePath): void
    {
        $fullPath = public_path(parse_url($filePath, PHP_URL_PATH));
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    public function addNewMultipleMedia(array $mediaFiles, string $collectionName = null): void
    {
        $this->addNewMedia($mediaFiles, $collectionName);
    }

    public function addMultipleMedia(array $mediaFiles, string $collectionName = null): void
    {
        $this->verifyMediaCollection('multiple', $collectionName);
        foreach ($mediaFiles as $media) {
            $uuid = Str::uuid();
            $path = $this->getPath($collectionName);
            $fileId = "{$uuid}.{$media->getClientOriginalExtension()}";
            $this->moveMedia($media, $path, $fileId);
            $url = $this->makeUrl($path, $fileId);
            $newMediaPaths[] = $url;
            $this->media()->create(
                [
                    'name' => $fileId,
                    'uuid' => $uuid,
                    'url' => $url,
                    'collection_name' => $collectionName,
                ]
            );
        }
    }

    public function updateMediaMultiple(array $mediaFiles, string $collectionName = null): void
    {
        $existingMediaNames = $this->media()->where('collection_name', $collectionName)->pluck('name')->toArray();
        $keepMedias = [];
        $newMedias = [];

        foreach ($mediaFiles as $media) {
            $fileName = gettype($media) == "object" ? $media->getClientOriginalName() : $this->media()->where('collection_name', $collectionName)->where('id', intval($media))->first()->name;
            if (in_array($fileName, $existingMediaNames)) {
                $keepMedias[] = $fileName;
            } else {
                $newMedias[] = $media;
            }
        }
        $this->deleteUnusedMedias($existingMediaNames, $keepMedias, $collectionName);
        $this->addNewMedia($newMedias, $collectionName);
    }

    private function deleteUnusedMedias(array $existingMediaNames, array $keepMedias, string $collectionName = null): void
    {
        $deleteMedias = array_diff($existingMediaNames, $keepMedias);
        foreach ($deleteMedias as $deleteImage) {
            $path = $this->getPath($collectionName);
            $this->deleteMediaFile($path . "/{$deleteImage}");
            $this->media()->where('name', $deleteImage)->delete();
        }
    }

    private function addNewMedia(array $newMedias, string $collectionName = null): void
    {
        foreach ($newMedias as $media) {
            $uuid = Str::uuid();
            $fileId = "{$uuid}.{$media->getClientOriginalExtension()}";
            $path = $this->getPath($collectionName);
            $this->moveMedia($media, $path, $fileId);
            $url = $this->makeUrl($path, $fileId);
            $this->media()->create([
                'name' => $fileId,
                'uuid' => $uuid,
                'url' => $url,
                'collection_name' => $collectionName,
            ]);
        }
    }

    public function clearMediaCollection(string $collectionName): void
    {
        $collection = $this->getMediaCollection($collectionName);
        foreach ($collection as $media) {
            $this->deleteMediaFile($media->url);
            $media->delete();
        }
    }

    private function getModelName(): string
    {
        return Str::lower(class_basename($this));
    }

    private function getPath(string $collectionName = null)
    {
        return "{$this->prefix}{$this->getModelName()}/{$collectionName}";
    }


    protected function verifyMediaCollection(string $type, string $collectionName = null): void
    {

        if (!isset($this->mediaCollections[$collectionName])) {
            throw new \Exception("Media collection {$collectionName} is not registered.");
        }

        if ($this->mediaCollections[$collectionName]['type'] !== $type) {
            throw new \Exception("Media collection {$collectionName} is not set to {$type}.");
        }
    }
}
