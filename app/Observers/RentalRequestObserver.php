<?php

namespace App\Observers;

use App\Models\RentalRequest;

class RentalRequestObserver
{
    /**
     * Handle the RentalRequest "created" event.
     */
    public function created(RentalRequest $rentalRequest): void
    {
        //
    }

    /**
     * Handle the RentalRequest "updated" event.
     */
    public function updated(RentalRequest $rentalRequest): void
    {
        //
    }

    /**
     * Handle the RentalRequest "deleted" event.
     */
    public function deleted(RentalRequest $rentalRequest): void
    {
        //
    }

    /**
     * Handle the RentalRequest "restored" event.
     */
    public function restored(RentalRequest $rentalRequest): void
    {
        //
    }

    /**
     * Handle the RentalRequest "force deleted" event.
     */
    public function forceDeleted(RentalRequest $rentalRequest): void
    {
        //
    }
}
