<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ReviewService;
use App\Http\Requests\Review\ReviewRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\ReviewResource;

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

    public function index(int $id): AnonymousResourceCollection
    {
        return ReviewResource::collection($this->reviewService->getReviews($id));
    }
}
