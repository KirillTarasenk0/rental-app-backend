<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Services\FavoritePropertyService;
use App\Http\Requests\Property\FavoritePropertyRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\PropertyResource;

class FavoritePropertyController extends Controller
{
    public function __construct(
        private readonly FavoritePropertyService $favoritePropertyService,
    ) {}

    public function store(FavoritePropertyRequest $request): JsonResponse
    {
        $this->favoritePropertyService->addFavoriteProperty($request['id']);
        return response()->json(['status' => 'property was added to favorite'], 200);
    }

    public function index(): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->favoritePropertyService->getFavoriteProperties());
    }

    public function destroy(FavoritePropertyRequest $request): JsonResponse
    {
        $this->favoritePropertyService->deleteFavoriteProperty($request['id']);
        return response()->json(['status' => 'property was deleted from favorite']);
    }
}
