<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'name' => 'required|string|min:3|max:100',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
        'phone_number' => 'required|string|max:20',
        'address' => ['required', 'string', 'min:5', 'regex:/[a-zA-Zأ-ي]/u'],
        'date_of_birth' => 'required|date|before:today',
        'gender' => 'required|in:male,female',
    ];
}

public function messages(): array
{
    return [
        'name.required' => 'Please enter the customer name.',
        'name.min' => 'The name must be at least 3 characters.',
        'name.max' => 'The name cannot exceed 100 characters.',

        'email.required' => 'Please enter the email address.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email is already registered.',

        'password.required' => 'Please enter a password.',
        'password.min' => 'The password must be at least 8 characters.',

        'phone_number.required' => 'Please enter the phone number.',
        'phone_number.max' => 'The phone number is too long.',

        'address.required' => 'Please enter the address.',
        'address.min' => 'The address must be at least 5 characters.',
        'address.regex' => 'The address must contain letters.',

        'date_of_birth.required' => 'Please enter the date of birth.',
        'date_of_birth.date' => 'Please enter a valid date.',
        'date_of_birth.before' => 'The date of birth must be before today.',

        'gender.required' => 'Please select the gender.',
        'gender.in' => 'Please select a valid gender.',
    ];
}
}
