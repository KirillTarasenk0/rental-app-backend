<?php

namespace App\Services;

use App\Contracts\BookPropertyServiceContract;
use App\Http\Requests\Property\BookPropertyRequest;
use App\Models\RentalRequest;
use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class BookPropertyService implements BookPropertyServiceContract
{
    public function bookProperty(BookPropertyRequest $request): void
    {
        RentalRequest::query()->create([
            'property_id' => $request->get('property_id'),
            'user_id' => Auth::id(),
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'comment' => $request->get('comment'),
            'status' => 'expectation',
        ]);
    }

    public function getBookedProperties(): Collection
    {
        return Property::query()
            ->whereHas('rentalRequests', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->with('propertyImages')
            ->get();
    }
}

