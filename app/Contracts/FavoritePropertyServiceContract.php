<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface FavoritePropertyServiceContract
{
    public function addFavoriteProperty(int $id): void;
    public function getFavoriteProperties(): Collection;
}
