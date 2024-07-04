<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer'],
            'rating' => ['required', 'numeric', 'min:1', 'max:5'],
            'cleanliness' => ['required', 'numeric', 'min:1', 'max:5'],
            'amenities' => ['required', 'numeric', 'min:1', 'max:5'],
            'location' => ['required', 'numeric', 'min:1', 'max:5'],
            'comment' => ['sometimes', 'string', 'max:1000'],
        ];
    }
}
