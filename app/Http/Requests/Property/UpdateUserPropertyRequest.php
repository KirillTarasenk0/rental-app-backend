<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer'],
            'title' => ['sometimes', 'string', 'max:255'],
            'address' => ['sometimes', 'string', 'max:255'],
            'price' => ['sometimes', 'numeric', 'min:0'],
            'description' => ['sometimes', 'string'],
            'property_type' => ['sometimes', 'string', 'in:flat,house,commercial'],
            'rooms' => ['sometimes', 'integer', 'min:0'],
            'area' => ['sometimes', 'numeric', 'min:0'],
            'floor' => ['sometimes', 'integer', 'min:0'],
            'total_floors' => ['sometimes', 'integer', 'min:0'],
            'furnished' => ['sometimes', 'boolean'],
            'parking' => ['sometimes', 'boolean'],
            'internet' => ['sometimes', 'boolean'],
            'city' => ['sometimes', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
}
