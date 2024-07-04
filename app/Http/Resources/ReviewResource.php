<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'property' => new PropertyResource($this->whenLoaded('property')),
            'user' => new UserResource($this->whenLoaded('user')),
            'rating' => $this->rating,
            'cleanliness' => $this->cleanliness,
            'amenities' => $this->amenities,
            'location' => $this->location,
            'comment' => $this->comment,
        ];
    }
}
