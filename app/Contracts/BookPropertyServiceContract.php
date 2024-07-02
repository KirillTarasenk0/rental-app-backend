<?php

namespace App\Contracts;

use App\Http\Requests\Property\BookPropertyRequest;

interface BookPropertyServiceContract
{
    public function bookProperty(BookPropertyRequest $request): void;
}
