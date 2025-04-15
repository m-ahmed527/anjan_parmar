<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Interfaces\MediaService\InteractsWithMedia;
use App\Services\MediaService\HasMedia;
use App\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements InteractsWithMedia
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRolesAndPermissions, HasMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }





    public function registerMediaCollection(): void
    {
        $this->addMediaCollection('avatar')->single();
    }

    public function getPhoneAttribute($value)
    {
        return preg_replace('/(\d{1})(\d{3})(\d{3})(\d{4})/', '$1 ($2) $3-$4', $value);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function vendorRequests(): HasMany
    {
        return $this->hasMany(VendorRequest::class, 'vendor_id');
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }


    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlists')->withTimestamps();
    }

    public function hasWishlisted($productId)
    {
        return $this->wishlist()->where('product_id', $productId)->exists();
    }

    public function wishlistCount()
    {
        return $this->wishlist()->count();
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
