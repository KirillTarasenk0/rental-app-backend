<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface PropertyGetPriceServiceContract
{
    public function getCheepPriceProperties(): LengthAwarePaginator;
    public function getMediumPriceProperties(): LengthAwarePaginator;
    public function getExpensivePriceProperties(): LengthAwarePaginator;
}
