<?php

namespace App\Models;

use App\Services\MediaService\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasMedia;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function registerMediaCollection(): void
    {
        $this->addMediaCollection('category')->single();
        $this->addMediaCollection('category_banner')->single();
    }
}
