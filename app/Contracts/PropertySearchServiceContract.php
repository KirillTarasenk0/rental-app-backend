<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\Property\PropertyRequest;

interface PropertySearchServiceContract
{
    public function getSearchedProperties(PropertyRequest $request): LengthAwarePaginator;
    public function getUserAddedProperties(int $userId): Collection;
}
