<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'id' => ['sometimes', 'numeric'],
            'title' => ['sometimes', 'string', 'min:3', 'max:80'],
            'address' => ['sometimes', 'string', 'min:3', 'max:120'],
            'price' => ['sometimes', 'numeric'],
            'description' => ['sometimes', 'string', 'min:3', 'max:250'],
            'property_type' => ['sometimes', 'in:flat,house,commercial'],
            'rooms' => ['sometimes', 'numeric'],
            'area' => ['sometimes', 'numeric'],
            'floor' => ['sometimes', 'numeric'],
            'total_floors' => ['sometimes', 'numeric'],
            'furnished' => ['sometimes', 'boolean'],
            'parking' => ['sometimes', 'boolean'],
            'internet' => ['sometimes', 'boolean'],
            'city' => ['sometimes', 'string', 'min:2', 'max:30'],
        ];
    }
}
