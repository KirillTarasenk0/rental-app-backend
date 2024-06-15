<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'address',
        'price',
        'description',
        'property_type',
        'rooms',
        'area',
        'floor',
        'total_floors',
        'furnished',
        'parking',
        'internet',
        'city',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function propertyImages(): HasMany
    {
        return $this->hasMany(PropertyImage::class);
    }
    public function rentalRequests(): HasMany
    {
        return $this->hasMany(RentalRequest::class);
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }
}
