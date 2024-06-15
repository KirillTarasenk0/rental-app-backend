<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface PropertyGetTypeServiceContract
{
    public function getAllProperties(): LengthAwarePaginator;
    public function getAllFlatsProperties(): LengthAwarePaginator;
    public function getAllHousesProperties(): LengthAwarePaginator;
    public function getAllCommercialProperties(): LengthAwarePaginator;
}
