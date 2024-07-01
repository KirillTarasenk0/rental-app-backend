<?php

namespace App\Services;

use App\Contracts\AddFavouritePropertyServiceContract;
use App\Models\Property;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class AddFavouritePropertyService implements AddFavouritePropertyServiceContract
{
    public function addFavouriteProperty(int $id): void
    {
        $property = Property::query()->find($id);
        if ($property) {
            Favorite::query()->create([
                'user_id' => Auth::id(),
                'property_id' => $property['id'],
            ]);
        }
    }
}
