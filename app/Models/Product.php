<?php

namespace App\Models;

use App\Services\MediaService\HasMedia;
use App\Traits\Filter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasMedia, Filter;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
    public function getMinPrice()
    {
        return $this->variants()->min('price') + $this->price ?? $this->price;
    }

    public function getMaxPrice()
    {
        return $this->variants()->max('price') + $this->price ?? $this->price;
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    // public function getValidCombinations()
    // {
    //     $combinations = [];
    //     $variants = $this->variants;
    //     foreach ($variants as $variant) {
    //         $combination = [];
    //         foreach ($variant->attributeValues as $attribute) {
    //             $combination[$attribute->attribute->name] = $attribute->value;
    //         }
    //         $combinations[] = $combination;
    //     }
    //     // dd($combinations);
    //     return $combinations;
    // }
    // public function attributes()
    // {
    //     return $this->belongsToMany(Attribute::class, 'attribute_products');
    // }

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


    public function wishlistedByUsers()
    {
        return $this->belongsToMany(User::class, 'wishlists')->withTimestamps();
    }
    public function registerMediaCollection(): void
    {
        $this->addMediaCollection('featured_image')->single();
        $this->addMediaCollection('multiple_images')->multiple();
    }
}
