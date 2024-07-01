<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Services\FavoritePropertyService;
use App\Http\Requests\Property\AddFavoritePropertyRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\PropertyResource;

class FavoritePropertyController
{
    public function __construct(
        private readonly FavoritePropertyService $favouritePropertyService,
    ) {}

    public function store(AddFavoritePropertyRequest $request): JsonResponse
    {
        $this->favouritePropertyService->addFavoriteProperty($request['id']);
        return response()->json(['status' => 'success'], 200);
    }

    public function index(): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->favouritePropertyService->getFavoriteProperties());
    }
}
