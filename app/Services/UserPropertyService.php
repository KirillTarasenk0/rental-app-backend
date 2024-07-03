<?php

namespace App\Services;

use App\Contracts\UserPropertyServiceContract;
use App\Http\Requests\Property\UpdateUserPropertyRequest;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\UploadPropertyPhotoTrait;

class UserPropertyService implements UserPropertyServiceContract
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

    public function getUserAddedProperties(int $userId): Collection
    {
        return Property::query()->with('propertyImages')->where('user_id', $userId)->get();
    }

    public function deleteUserAddedProperty(int $id): void
    {
        Property::query()->find($id)->delete();
    }

    public function updateUserAddedProperty(UpdateUserPropertyRequest $request): void
    {
        $property = Property::query()->findOrFail($request->id);
        $data = $request->only([
            'title',
            'address',
            'price',
            'description',
            'property_type',
            'rooms',
            'area',
            'floor',
            'total_floors',
            'furnished',
            'parking',
            'internet',
            'city'
        ]);
        $data['user_id'] = Auth::id();
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });
        $property->update($data);
        if ($request->hasFile('image')) {
            $propertyImage = $request->file('image');
            $url = $this->uploadFile($propertyImage);
            PropertyImage::query()->create([
                'property_id' => $property->id,
                'image_path' => $url,
            ]);
        }
    }
}
