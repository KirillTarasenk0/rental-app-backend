<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\PropertyResource;
use App\Services\PropertyGetPriceService;

class PropertyGetPriceController extends Controller
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
