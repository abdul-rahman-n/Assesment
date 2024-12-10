<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'father_name.max' => 'Father\'s name cannot exceed 255 characters.',
            'mother_name.max' => 'Mother\'s name cannot exceed 255 characters.',
        ];
    }
}
