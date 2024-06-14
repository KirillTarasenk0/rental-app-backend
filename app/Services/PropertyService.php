<?php

namespace App\Services;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PropertyService
{
    public function getAllProperties(): LengthAwarePaginator
    {
        return Property::query()->with('propertyImages')->paginate(10);
    }
}
