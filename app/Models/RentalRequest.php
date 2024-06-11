<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentalRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'user_id',
        'name',
        'phone',
        'email',
        'comment',
        'status',
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
