<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ReviewService;
use App\Http\Requests\Review\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    public function __construct(
        private readonly ReviewService $reviewService,
    ) {}

    public function store(ReviewRequest $request): JsonResponse
    {
        try {
            $this->reviewService->addReview($request);
            return response()->json(['status' => 'review was successfully added'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to add review', 'message' => $e->getMessage()], 500);
        }
    }
}
