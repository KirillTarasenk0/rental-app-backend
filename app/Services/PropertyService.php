<?php

namespace App\Services;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Contracts\PropertyServiceContract;

class PropertyService implements PropertyServiceContract
{
    public function getAllProperties(): LengthAwarePaginator
    {
        return Property::query()->with('propertyImages')->paginate(10);
    }
    public function getAllFlatsProperties(): LengthAwarePaginator
    {
        return Property::query()->with('propertyImages')
            ->where('property_type', 'flat')->paginate(10);
    }

}
