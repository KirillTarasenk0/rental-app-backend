<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Property\PropertyRequest;
use App\Services\PropertySearchService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\PropertyResource;

class PropertySearchController
{
    public function __construct(
        private PropertySearchService $propertySearchService
    ) {}
    public function showSearchedProperties(PropertyRequest $request): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->propertySearchService->getSearchedProperties($request));
    }
}
