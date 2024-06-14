<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class CreatePropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:80'],
            'address' => ['required', 'string', 'min:3', 'max:120'],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'string', 'min:3', 'max:250'],
            'property_type' => ['required', 'in:flat,house,commercial'],
            'rooms' => ['required', 'numeric'],
            'area' => ['required', 'numeric'],
            'floor' => ['required', 'numeric'],
            'total_floors' => ['required', 'numeric'],
            'furnished' => ['required', 'boolean'],
            'parking' => ['required', 'boolean'],
            'internet' => ['required', 'boolean'],
        ];
    }
}
