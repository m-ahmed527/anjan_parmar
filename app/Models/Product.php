<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['íd'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }


    public function variants()
    {
        return $this->belongsToMany(Variant::class, 'product_variants')->withPivot('add_on_price', 'discount_type', 'discount', 'quantity');
    }


    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_products');
    }
}
