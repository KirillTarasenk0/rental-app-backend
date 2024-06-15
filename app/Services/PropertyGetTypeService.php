<?php

namespace App\Services;

use App\Models\Property;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Contracts\PropertyGetTypeServiceContract;

class PropertyGetTypeService implements PropertyGetTypeServiceContract
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
    public function getAllHousesProperties(): LengthAwarePaginator
    {
        return Property::query()->with('propertyImages')
            ->where('property_type', 'house')->paginate(10);
    }
    public function getAllCommercialProperties(): LengthAwarePaginator
    {
        return Property::query()->with('propertyImages')
            ->where('property_type', 'commercial')->paginate(10);
    }
}
