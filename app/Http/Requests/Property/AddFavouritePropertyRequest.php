<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class AddFavouritePropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:properties,id'],
        ];
    }
}
