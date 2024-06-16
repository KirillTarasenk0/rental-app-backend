<?php

namespace App\Services;

use App\Contracts\PropertyGetRoomsServiceContract;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Property;

class PropertyGetRoomsService implements PropertyGetRoomsServiceContract
{
    public function getRoomsCountProperties(string $roomsCount): LengthAwarePaginator
    {
        if ($roomsCount === 'more') {
            return Property::query()->with('propertyImages')
                ->where('rooms', '>', 6)->paginate();
        } else {
            return Property::query()->with('propertyImages')
                ->where('rooms', $roomsCount)->paginate();
        }
    }
}
