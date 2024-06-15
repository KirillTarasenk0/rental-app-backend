<?php

namespace App\Services;

use App\Contracts\PropertyGetPriceServiceContract;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Property;

class PropertyGetPriceService implements PropertyGetPriceServiceContract
{
    public function getCheepPriceProperties(): LengthAwarePaginator
    {
        return Property::query()->with('propertyImages')
            ->where('price', '<', 150000)->paginate();
    }
    public function getMediumPriceProperties(): LengthAwarePaginator
    {
        return Property::query()->with('propertyImages')
            ->whereBetween('price', [150000, 250000])->paginate();
    }
    public function getExpensivePriceProperties(): LengthAwarePaginator
    {
        return Property::query()->with('propertyImages')
            ->where('price', '>', 250000)->paginate();
    }
}
