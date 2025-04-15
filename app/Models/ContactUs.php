<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $guarded = ['id'];

    public function getPhoneAttribute($value)
    {
        return preg_replace('/(\d{1})(\d{3})(\d{3})(\d{4})/', '$1 ($2) $3-$4', $value);
    }
}
