<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function billingAddress()
    {
        return $this->hasOne(BillingAdress::class);
    }

    public function shippingAddress()
    {
        return $this->hasOne(ShippingAdress::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['product_name', 'variant_id', 'variant_name', 'quantity', 'price', 'discount', 'sub_total', 'total'])->withTimestamps();
    }
}
