<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PropertySearchService;
use App\Http\Resources\PropertyResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetUserAddedPropertiesController extends Controller
{
    public function __construct(
        private readonly PropertySearchService $propertySearchService,
    ) {}

    public function index(int $userId): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->propertySearchService->getUserAddedProperties($userId));
    }
}
