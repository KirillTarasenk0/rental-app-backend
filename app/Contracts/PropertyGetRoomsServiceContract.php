<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface PropertyGetRoomsServiceContract
{
    public function getRoomsCountProperties(int $roomsCount): LengthAwarePaginator;
}
