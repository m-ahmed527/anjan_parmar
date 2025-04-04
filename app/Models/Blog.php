<?php

namespace App\Models;

use App\Services\MediaService\HasMedia;
use App\Traits\Filter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasMedia, Filter;


    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function registerMediaCollection(): void
    {
        $this->addMediaCollection('blog_image')->single();
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('M-d-Y');
    }
}
