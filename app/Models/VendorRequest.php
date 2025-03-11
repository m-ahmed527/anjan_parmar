<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VendorRequest extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'request_id';
    }
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function responses(): HasMany
    {
        return $this->hasMany(VendorResponse::class, 'vendor_request_id');
    }
}
