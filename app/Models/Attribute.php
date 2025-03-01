<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    // public function variants()
    // {
    //     return $this->hasMany(Variant::class);
    // }

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
