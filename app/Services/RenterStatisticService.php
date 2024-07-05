<?php

namespace App\Services;

use App\Contracts\RenterStatisticServiceContract;
use Illuminate\Support\Collection;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RenterStatisticService implements RenterStatisticServiceContract
{
    public function getRenterAddedPropertyStatistic(): Collection
    {
        return Property::query()->leftJoin('reviews', 'properties.id', '=', 'reviews.property_id')
            ->where('properties.user_id', Auth::id())
            ->select('properties.id', 'properties.title',
                DB::raw('COUNT(reviews.id) as review_count'),
                DB::raw('AVG(reviews.rating) as average_rating'),
                DB::raw('AVG(reviews.cleanliness) as average_cleanliness'),
                DB::raw('AVG(reviews.amenities) as average_amenities'),
                DB::raw('AVG(reviews.location) as average_location'))
            ->groupBy('properties.id', 'properties.title')
            ->get();
    }
}
