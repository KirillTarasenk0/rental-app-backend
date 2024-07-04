<?php

namespace App\Contracts;

use App\Http\Requests\Review\ReviewRequest;

interface ReviewServiceContract
{
    public function addReview(ReviewRequest $request): void;
}
