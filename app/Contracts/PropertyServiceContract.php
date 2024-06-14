<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface PropertyServiceContract
{
    public function getAllProperties(): LengthAwarePaginator;
}
