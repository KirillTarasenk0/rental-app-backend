<?php

namespace App\Http\Controllers\Api;

use App\Services\PropertyGetTypeService;
use App\Http\Resources\PropertyResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PropertyGetTypeController
{
    public function __construct(
        private PropertyGetTypeService $flatService
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
