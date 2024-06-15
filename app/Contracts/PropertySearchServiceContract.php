<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\Property\PropertyRequest;

interface PropertySearchServiceContract
{
    public function getSearchedProperties(PropertyRequest $request): LengthAwarePaginator;
}
