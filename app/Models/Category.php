<?php

namespace App\Models;

use App\Services\MediaService\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasMedia, SoftDeletes;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)->withTimestamps();
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }


    public function registerMediaCollection(): void
    {
        $this->addMediaCollection('category')->single();
        $this->addMediaCollection('category_banner')->single();
    }
}
