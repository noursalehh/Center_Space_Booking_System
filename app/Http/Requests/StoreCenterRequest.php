<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCenterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

   public function rules(): array
{
    return [
        'name' => 'required|string|min:3|max:100',
        'description' => 'required|string|min:10',
        'address' => ['required', 'string', 'min:5', 'regex:/[a-zA-Zأ-ي]/u'],
        'city' => 'required|string|min:2|max:100',
        'country' => 'required|string|min:2|max:100',
        'latitude' => 'nullable|numeric|between:-90,90',
        'longitude' => 'nullable|numeric|between:-180,180',
        'contact_number' => 'required|string|max:20',
        'status' => 'required|in:active,inactive',
    ];
}

public function messages(): array
{
    return [
        'name.required' => 'Please enter the center name.',
        'name.min' => 'The center name must be at least 3 characters.',
        'name.max' => 'The center name cannot exceed 100 characters.',

        'description.required' => 'Please enter the center description.',
        'description.min' => 'The description must be at least 10 characters.',

        'address.required' => 'Please enter the center address.',
        'address.min' => 'The address must be at least 5 characters.',
        'address.regex' => 'The address must contain letters.',

        'city.required' => 'Please enter the city.',
        'city.min' => 'The city name must be at least 2 characters.',
        'city.max' => 'The city name is too long.',

        'country.required' => 'Please enter the country.',
        'country.min' => 'The country name must be at least 2 characters.',
        'country.max' => 'The country name is too long.',

        'latitude.numeric' => 'The latitude must be a number.',
        'latitude.between' => 'The latitude must be between -90 and 90.',

        'longitude.numeric' => 'The longitude must be a number.',
        'longitude.between' => 'The longitude must be between -180 and 180.',

        'contact_number.required' => 'Please enter the contact number.',
        'contact_number.max' => 'The contact number is too long.',

        'status.required' => 'Please select the center status.',
        'status.in' => 'Please select a valid center status.',
    ];
}
}