<?php

namespace App\Services;

use App\Contracts\PropertyGetRoomsServiceContract;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Property;

class PropertyGetRoomsService implements PropertyGetRoomsServiceContract
{
    public function getRoomsCountProperties(int $roomsCount): LengthAwarePaginator
    {
        if ($roomsCount <= 6) {
            return Property::query()->with('propertyImages')
                ->where('rooms', $roomsCount)->paginate();
        } else {
            return Property::query()->with('propertyImages')
                ->where('rooms', '>', $roomsCount)->paginate();
        }
    }
}
