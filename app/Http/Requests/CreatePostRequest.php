<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Add your authorization logic here
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'body' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A title is required for the post.',
            'title.max' => 'The title cannot exceed 255 characters.',
            'body.required' => 'Post content is required.'
        ];
    }
} 