<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function products()
    // {
    //     return $this->belongsToMany(Product::class)->withPivot('variant_price', 'quantity')->withTimestamps();
    // }

    // public function attribute()
    // {
    //     return $this->belongsTo(Attribute::class);
    // }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'variant_attribute_values');
    }
}
