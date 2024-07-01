<?php

namespace App\Contracts;

interface AddFavouritePropertyServiceContract
{
    public function addFavouriteProperty(int $id): void;
}
