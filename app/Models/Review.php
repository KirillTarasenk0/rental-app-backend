<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'user_id',
        'rating',
        'cleanliness',
        'amenities',
        'location',
        'comment',
    ];
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
