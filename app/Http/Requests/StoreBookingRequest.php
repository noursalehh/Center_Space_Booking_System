<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'space_id' => 'required|exists:spaces,id',
        'booking_date' => 'required|date|after_or_equal:today',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
        'number_of_people' => 'required|integer|min:1',
    ];
}

public function messages(): array
{
    return [
        'space_id.required' => 'Please select a space.',
        'space_id.exists' => 'The selected space does not exist.',

        'booking_date.required' => 'Please select a booking date.',
        'booking_date.date' => 'Please enter a valid booking date.',
        'booking_date.after_or_equal' => 'The booking date cannot be in the past.',

        'start_time.required' => 'Please select a start time.',
        'start_time.date_format' => 'The start time must be in a valid format.',

        'end_time.required' => 'Please select an end time.',
        'end_time.date_format' => 'The end time must be in a valid format.',
        'end_time.after' => 'The end time must be after the start time.',

        'number_of_people.required' => 'Please enter the number of people.',
        'number_of_people.integer' => 'The number of people must be a whole number.',
        'number_of_people.min' => 'The number of people must be at least 1.',
    ];
}
}