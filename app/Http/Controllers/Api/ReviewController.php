<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ReviewService;
use App\Http\Requests\Review\ReviewRequest;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    public function __construct(
        private readonly ReviewService $reviewService,
    ) {}

    public function store(ReviewRequest $request): JsonResponse
    {
        return response()->json([]);
    }
}
