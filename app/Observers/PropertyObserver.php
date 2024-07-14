<?php

namespace App\Observers;

use App\Models\Property;
use App\Mail\PropertyCreatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use App\Services\PropertySearchService;

class PropertyObserver implements ShouldHandleEventsAfterCommit
{
    public function __construct(
        private readonly PropertySearchService $propertySearchService,
    ) {}

    public function created(Property $property): void
    {
        Mail::to('kirtaras228@yandex.ru')->queue(new PropertyCreatedMail($this->propertySearchService));
    }

    /**
     * Handle the Property "updated" event.
     */
    public function updated(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "deleted" event.
     */
    public function deleted(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "restored" event.
     */
    public function restored(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "force deleted" event.
     */
    public function forceDeleted(Property $property): void
    {
        //
    }
}
