<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Services\AddPropertyService;
use Illuminate\Http\Request;

class AddPropertyController
{
    public function __construct(
        private readonly AddPropertyService $addPropertyService,
    ) {}

    public function store(Request $request): JsonResponse
    {
        try {
            $this->addPropertyService->addProperty($request);
            return response()->json(['status' => 'property was successfully set'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
