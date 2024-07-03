<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use Illuminate\Http\JsonResponse;
use App\Services\UserPropertyService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserPropertyController extends Controller
{
    public function __construct(
        private readonly UserPropertyService $userPropertyService,
    ) {}

    public function store(Request $request): JsonResponse
    {
        try {
            $this->userPropertyService->addProperty($request);
            return response()->json(['status' => 'property was successfully set'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function index(int $userId): AnonymousResourceCollection
    {
        return PropertyResource::collection($this->userPropertyService->getUserAddedProperties($userId));
    }

    public function destroy(Request $request): JsonResponse
    {
        $this->userPropertyService->deleteUserAddedProperty($request['id']);
        return response()->json(['status' => 'property was successfully delete']);
    }
}
