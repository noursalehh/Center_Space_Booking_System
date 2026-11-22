<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $employee = $this->route('employee');

        return [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:users,email,' . $employee->user_id,
            'password' => 'nullable|string|min:8',
            'phone_number' => 'required|string|max:20',
            'address' => ['required', 'string', 'min:5', 'regex:/[a-zA-Zأ-ي]/u'],
            'job_title' => 'required|string|min:2|max:100',
            'hire_date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter the employee name.',
            'name.min' => 'The name must be at least 3 characters.',
            'name.max' => 'The name cannot exceed 100 characters.',

            'email.required' => 'Please enter the email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',

            'password.min' => 'The password must be at least 8 characters.',

            'phone_number.required' => 'Please enter the phone number.',
            'phone_number.max' => 'The phone number is too long.',

            'address.required' => 'Please enter the address.',
            'address.min' => 'The address must be at least 5 characters.',
            'address.regex' => 'The address must contain letters.',

            'job_title.required' => 'Please enter the job title.',
            'job_title.min' => 'The job title must be at least 2 characters.',
            'job_title.max' => 'The job title is too long.',

            'hire_date.required' => 'Please select the hire date.',
            'hire_date.date' => 'Please enter a valid hire date.',
        ];
    }
}
