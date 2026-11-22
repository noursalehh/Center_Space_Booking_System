<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpaceRequest extends FormRequest
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
        'type' => 'required|string|min:2|max:100',
        'center_id' => 'required|exists:centers,id',
        'maximum_capacity' => 'required|integer|min:1',
        'hourly_price' => 'required|numeric|min:0',
        'status' => 'required|in:available,maintenance',
    ];
}

public function messages(): array
{
    return [
        'name.required' => 'Please enter the space name.',
        'name.min' => 'The space name must be at least 3 characters.',
        'name.max' => 'The space name is too long.',

        'description.required' => 'Please enter the space description.',
        'description.min' => 'The description must be at least 10 characters.',

        'type.required' => 'Please select the space type.',
        'type.min' => 'The space type must be at least 2 characters.',
        'type.max' => 'The space type is too long.',

        'center_id.required' => 'Please select a center.',
        'center_id.exists' => 'The selected center does not exist.',

        'maximum_capacity.required' => 'Please enter the maximum capacity.',
        'maximum_capacity.integer' => 'The capacity must be a whole number.',
        'maximum_capacity.min' => 'The capacity must be at least 1.',

        'hourly_price.required' => 'Please enter the hourly price.',
        'hourly_price.numeric' => 'The hourly price must be a number.',
        'hourly_price.min' => 'The hourly price cannot be negative.',

        'status.required' => 'Please select the space status.',
        'status.in' => 'Please select a valid space status.',
    ];
}
}