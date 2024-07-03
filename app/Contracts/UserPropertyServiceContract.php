<?php

namespace App\Contracts;

use App\Http\Requests\Property\UpdateUserPropertyRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface UserPropertyServiceContract
{
    public function addProperty(Request $request): void;
    public function getUserAddedProperties(int $userId): Collection;
    public function deleteUserAddedProperty(int $id): void;
    public function updateUserAddedProperty(UpdateUserPropertyRequest $request): void;
}
