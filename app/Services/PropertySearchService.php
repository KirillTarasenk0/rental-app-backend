<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Contracts\PropertySearchServiceContract;
use App\Models\Property;
use App\Http\Requests\Property\PropertyRequest;
use Illuminate\Database\Eloquent\Collection;

class PropertySearchService implements PropertySearchServiceContract
{
    public function getSearchedProperties(PropertyRequest $request): LengthAwarePaginator
    {
        $propertiesQuery = Property::query()->with('propertyImages');
        $propertiesQuery->when($request->filled('id'), function ($query) use ($request) {
            return $query->where('id', $request['id']);
        });
        $propertiesQuery->when($request->filled('property_type'), function ($query) use ($request) {
            return $query->where('property_type', $request['property_type']);
        });
        $propertiesQuery->when($request->filled('rooms'), function ($query) use ($request) {
            if ($request['rooms'] === 'more_rooms') {
                return $query->where('rooms', '>', 6);
            } else {
                return $query->where('rooms', $request['rooms']);
            }
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

    public function getUserAddedProperties(int $userId): Collection
    {
        return Property::query()->with('propertyImages')->where('user_id', $userId)->get();
    }
}
