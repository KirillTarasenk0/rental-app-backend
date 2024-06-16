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
            ->where('price', '<', 30000)->paginate();
    }
    public function getMediumPriceProperties(): LengthAwarePaginator
    {
        return Property::query()->with('propertyImages')
            ->whereBetween('price', [30000, 80000])->paginate();
    }
    public function getExpensivePriceProperties(): LengthAwarePaginator
    {
        return Property::query()->with('propertyImages')
            ->where('price', '>', 80000)->paginate();
    }
}
