<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'location_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'pincode' => 'required|digits:6',
        ];
    }

    public function messages()
    {
        return [
            'location_name.required' => 'Location name is required.',
            'address.required' => 'Address is required.',
            'pincode.required' => 'Pincode is required.',
            'pincode.digits' => 'Pincode must be exactly 6 digits.',
        ];
    }
}
