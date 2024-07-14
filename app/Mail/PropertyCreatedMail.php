<?php

namespace App\Mail;

use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Auth;
use App\Services\PropertySearchService;

class PropertyCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    private Property $userLastAddedProperty;

    public function __construct(PropertySearchService $propertySearchService)
    {
        $this->userLastAddedProperty = $propertySearchService->getUserLastAddedProperty();
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Поздравляем! Объявление было успешно создано!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mails.property_created_mail',
            with: [
                'userName' => Auth::getName(),
                'propertyTitle' => $this->userLastAddedProperty['title'],
                'propertyAddress' => $this->userLastAddedProperty['address'],
                'propertyPrice' => $this->userLastAddedProperty['price'],
                'propertyDescription' => $this->userLastAddedProperty['description'],
                'propertyType' => $this->userLastAddedProperty['property_type'],
                'propertyRooms' => $this->userLastAddedProperty['rooms'],
                'propertyArea' => $this->userLastAddedProperty['area'],
                'propertyFloor' => $this->userLastAddedProperty['floor'],
                'propertyTotalFloors' => $this->userLastAddedProperty['total_floors'],
                'propertyFurnished' => $this->userLastAddedProperty['furnished'],
                'propertyParking' => $this->userLastAddedProperty['parking'],
                'propertyInternet' => $this->userLastAddedProperty['internet'],
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
