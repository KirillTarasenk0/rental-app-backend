<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BookPropertyService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Property\BookPropertyRequest;
use Exception;

class BookPropertyController extends Controller
{
    public function __construct(
        private readonly BookPropertyService $bookPropertyService,
    ) {}

    public function store(BookPropertyRequest $request): JsonResponse
    {
        try {
            $this->bookPropertyService->bookProperty($request);
            return response()->json(['status' => 'property was booked'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

