<?php

namespace App\Models;

use App\Services\MediaService\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasMedia, SoftDeletes;
    protected $guarded = ['íd'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }


    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_products');
    }

    public function discount()
    {
        $discountedPrice = '';
        if ($this->discount_type == 'percent') {
            $discountedPrice = $this->price - ($this->price * $this->discount / 100);
            // dd($discountedPrice, $this->price, $this->discount);
            return $discountedPrice;
        } else {
            return ($this->price - $this->discount);
        }
    }
    public function registerMediaCollection(): void
    {
        $this->addMediaCollection('featured_image')->single();
        $this->addMediaCollection('multiple_images')->multiple();
    }
}
