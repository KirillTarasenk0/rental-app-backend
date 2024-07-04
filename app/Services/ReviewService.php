<?php

namespace App\Services;

use App\Contracts\ReviewServiceContract;
use App\Http\Requests\Review\ReviewRequest;
use App\Models\Review;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ReviewService implements ReviewServiceContract
{
    public function addReview(ReviewRequest $request): void
    {
        Review::query()->create([
            'property_id' => $request->id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'cleanliness' => $request->cleanliness,
            'amenities' => $request->amenities,
            'location' => $request->location,
            'comment' => $request->comment ?? null,
        ]);
    }

    public function getReviews(int $id): Collection
    {
        return Review::with(['user', 'property', 'property.propertyImages'])
            ->where('property_id', $id)
            ->get();
    }
}
