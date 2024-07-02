<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PropertyGetRoomsService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\PropertyResource;

class PropertyGetRoomsController extends Controller
{
    public function __construct(
        private PropertyGetRoomsService $propertyGetRoomsService
    ) {}
    public function showRoomsCountProperties(string $roomsCount): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->propertyGetRoomsService->getRoomsCountProperties($roomsCount));
    }
}
