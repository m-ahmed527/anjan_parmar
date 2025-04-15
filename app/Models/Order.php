<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'order_id';
    }

    public function getPhoneAttribute($value)
    {
        return preg_replace('/(\d{1})(\d{3})(\d{3})(\d{4})/', '+$1 ($2) $3-$4', $value);
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-M-Y H:i A');
    }
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
        return $this->belongsToMany(Product::class, 'order_products')->withPivot(['product_name', 'variant_id', 'variant_name', 'quantity', 'product_price', 'variant_price', 'price', 'discount', 'sub_total', 'total'])->withTimestamps();
    }
}
