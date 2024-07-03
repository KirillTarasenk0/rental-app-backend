<?php

namespace App\Contracts;

use App\Http\Requests\Property\BookPropertyRequest;
use Illuminate\Database\Eloquent\Collection;

interface BookPropertyServiceContract
{
    public function bookProperty(BookPropertyRequest $request): void;
    public function getBookedProperties(): Collection;
}
