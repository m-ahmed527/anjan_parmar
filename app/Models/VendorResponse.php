<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VendorResponse extends Model
{
    protected $guarded = ['id'];

    public function vendorRequest(): BelongsTo
    {
        return $this->belongsTo(VendorRequest::class, 'vendor_request_id');
    }
}
