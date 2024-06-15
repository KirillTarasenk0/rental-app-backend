<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Contracts\PropertySearchServiceContract;
use App\Models\Property;
use App\Http\Requests\Property\PropertyRequest;

class PropertySearchService implements PropertySearchServiceContract
{
    public function getSearchedProperties(PropertyRequest $request): LengthAwarePaginator
    {
        $propertiesQuery = Property::query();
        $propertiesQuery->when($request->filled('property_type'), function ($query) use ($request) {
            return $query->where('property_type', $request['property_type']);
        });
        $propertiesQuery->when($request->filled('rooms'), function ($query) use ($request) {
            return $query->where('rooms', $request['rooms']);
        });
        $propertiesQuery->when($request->filled('price_from'), function ($query) use ($request) {
            return $query->where('price', '>=', $request['price_from']);
        });
        $propertiesQuery->when($request->filled('price_to'), function ($query) use ($request) {
            return $query->where('price', '<=', $request['price_to']);
        });
        $propertiesQuery->when($request->filled('city'), function ($query) use ($request) {
            return $query->where('city', $request['city']);
        });
        return $propertiesQuery->paginate();
    }
}
