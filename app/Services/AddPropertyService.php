<?php

namespace App\Services;

use App\Contracts\AddPropertyServiceContract;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\UploadPropertyPhotoTrait;

class AddPropertyService implements AddPropertyServiceContract
{
    use UploadPropertyPhotoTrait;

    public function addProperty(Request $request): void
    {
        $property = Property::query()->create([
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'address' => $request['address'],
            'price' => $request['price'],
            'description' => $request['description'],
            'property_type' => $request['property_type'],
            'rooms' => $request['rooms'],
            'area' => $request['area'],
            'floor' => $request['floor'],
            'total_floors' => $request['total_floors'],
            'furnished' => $request['furnished'],
            'parking' => $request['parking'],
            'internet' => $request['internet'],
            'city' => $request['city'],
        ]);
        if ($request->hasFile('image')) {
            $propertyImage = $request->file('image');
            $url = $this->uploadFile($propertyImage);
            PropertyImage::query()->create([
                'property_id' => $property['id'],
                'image_path' => $url,
            ]);
        }
    }
}
