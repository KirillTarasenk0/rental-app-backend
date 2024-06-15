<?php

namespace App\Http\Controllers\Api;

use App\Services\PropertyGetRoomsService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\PropertyResource;

class PropertyGetRoomsController
{
    public function __construct(
        private PropertyGetRoomsService $propertyGetRoomsService
    ) {}
    public function showRoomsCountProperties(int $roomsCount): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->propertyGetRoomsService->getRoomsCountProperties($roomsCount));
    }
}
