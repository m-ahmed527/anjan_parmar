<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('variant_price', 'quantity')->withTimestamps();
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
