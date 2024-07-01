<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Services\AddFavouritePropertyService;
use App\Http\Requests\Property\AddFavouritePropertyRequest;

class AddFavouritePropertyController
{
    public function __construct(
        private readonly AddFavouritePropertyService $addFavouritePropertyService,
    ) {}

    public function store(AddFavouritePropertyRequest $request): JsonResponse
    {
        $this->addFavouritePropertyService->addFavouriteProperty($request['id']);
        return response()->json(['status' => 'success'], 200);
    }
}
