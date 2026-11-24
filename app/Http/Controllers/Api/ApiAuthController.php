<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterCustomerRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ApiAuthController extends Controller
{
    public function register(RegisterCustomerRequest $request)
    {
        $validated = $request->validated();
        $user = User::query()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'type' => 'customer',
        ]);

        $customer= $user->customer()->create([
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'message' => 'Registered!',
            'data' => [
                'user' => $user,
                'customer' => $customer,
                'token' => $token,
            ],
        ], 201);
    }
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $user = User::query()->where('email', $validated['email']) ->first();

        if (!$user || !Hash::check($validated['password'], $user->password) || $user->type !== 'customer') {
            return response()->json([
                'message' => 'You cannot login, Try later',
            ], 401);
        }

        $token = $user->createToken('customer-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token,
        ]);
    }
    public function logout()
    {
        return auth()->user()->currentAccessToken()->delete();
    }
    public function myProfile()
    {
        return auth()->user();
    }
}
