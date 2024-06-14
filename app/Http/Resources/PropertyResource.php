<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PropertyImageResource;

class PropertyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'address' => $this->address,
            'price' => $this->price,
            'description' => $this->description,
            'property_type' => $this->property_type,
            'rooms' => $this->rooms,
            'area' => $this->area,
            'floor' => $this->floor,
            'total_floors' => $this->total_floors,
            'furnished' => $this->furnished,
            'parking' => $this->parking,
            'internet' => $this->internet,
            'property_images' => PropertyImageResource::collection($this->whenLoaded('propertyImages')),
        ];
    }
}
