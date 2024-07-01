<?php

namespace App\Services;

use App\Contracts\FavoritePropertyServiceContract;
use App\Models\Property;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class FavoritePropertyService implements FavoritePropertyServiceContract
{
    public function addFavoriteProperty(int $id): void
    {
        $property = Property::query()->find($id);
        if ($property) {
            $existingFavorite = Favorite::query()
                ->where('user_id', Auth::id())
                ->where('property_id', $property->id)
                ->first();
            if (!$existingFavorite) {
                Favorite::query()->create([
                    'user_id' => Auth::id(),
                    'property_id' => $property->id,
                ]);
            } else {
                throw new \Exception('Property is already in favorites');
            }
        } else {
            throw new \Exception('Property not found');
        }
    }

    public function getFavoriteProperties(): Collection
    {
        return Favorite::with('property.propertyImages')
            ->where('user_id', Auth::id())
            ->get()
            ->map(function ($favorite) {
                return $favorite->property;
            });
    }
}
