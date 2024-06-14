<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Property\CreatePropertyRequest;
use App\Services\PropertyService;
use App\Http\Resources\PropertyResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PropertyController
{
    public function __construct(
        private PropertyService $flatService
    ) {}
    public function showAllProperties(): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->flatService->getAllProperties());
    }
    public function showAllFlatsProperties(): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->flatService->getAllFlatsProperties());
    }
    public function showAllHousesProperties(): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->flatService->getAllHousesProperties());
    }
    public function showAllCommercialProperties(): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->flatService->getAllCommercialProperties());
    }
}
