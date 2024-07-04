<?php

namespace App\Contracts;

use App\Http\Requests\Review\ReviewRequest;
use Illuminate\Database\Eloquent\Collection;

interface ReviewServiceContract
{
    public function addReview(ReviewRequest $request): void;
    public function getReviews(int $id): Collection;
}
