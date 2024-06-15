<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\PropertyResource;
use App\Services\PropertyGetPriceService;

class PropertyGetPriceController
{
    public function __construct(
        private PropertyGetPriceService $propertyGetPriceService
    ) {}
    public function showCheepPriceProperties(): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->propertyGetPriceService->getCheepPriceProperties());
    }
    public function showMediumPriceProperties(): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->propertyGetPriceService->getMediumPriceProperties());
    }
    public function showExpensivePriceProperties(): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->propertyGetPriceService->getExpensivePriceProperties());
    }
}
