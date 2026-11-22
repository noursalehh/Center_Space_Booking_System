<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'status' => 'required|in:confirmed,rejected',
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Please select a booking status.',
            'status.in' => 'The booking status must be confirmed or rejected.',
        ];
    }
}
