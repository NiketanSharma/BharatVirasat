<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHeritageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'category' => 'required|string|in:festival,dance,art,cuisine,monument,music',
            'state' => 'required|string|max:100',
            'short_desc' => 'required|string|max:500',
            'long_desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The heritage item name is required.',
            'category.required' => 'Please select a category.',
            'category.in' => 'Please select a valid category.',
            'state.required' => 'The state of origin is required.',
            'short_desc.required' => 'A short description is required.',
            'short_desc.max' => 'Short description must not exceed 500 characters.',
            'long_desc.required' => 'A detailed description is required.',
            'image.image' => 'The file must be an image.',
            'image.max' => 'The image must not exceed 2MB.',
        ];
    }
}
