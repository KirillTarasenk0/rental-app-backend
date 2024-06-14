<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface PropertyServiceContract
{
    public function getAllProperties(): LengthAwarePaginator;
    public function getAllFlatsProperties(): LengthAwarePaginator;
    public function getAllHousesProperties(): LengthAwarePaginator;
    public function getAllCommercialProperties(): LengthAwarePaginator;
}
