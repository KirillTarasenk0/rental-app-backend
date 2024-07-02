<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class BookPropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'property_id' => ['required', 'integer', 'exists:properties,id'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'comment' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
