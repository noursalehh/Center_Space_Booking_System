<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Space;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(StoreBookingRequest $request)
    {

        $validated = $request->validated();

        $customer = auth()->user()->customer;

        if (!$customer) {
            return response()->json([
                'message' => 'This Customer Doesnot Register! '
            ], 404);
        }

        $space = Space::with('center')->findOrFail(
            $validated['space_id']
        );


        if ($space->center->status !== 'active') {
            return response()->json([
                'message' => 'You Cannot book a space in an inactive center.'
            ], 422);
        }


        if ($space->status !== 'available') {
            return response()->json([
                'message' => 'This space is not available for booking!!!'
            ], 422);
        }


        if ($validated['number_of_people'] > $space->maximum_capacity) {
            return response()->json([
                'message' => 'Number of people more than maximum capacity.'
            ], 422);
        }


        $start = strtotime($validated['start_time']);
        $end = strtotime($validated['end_time']);

        $durationInMinutes = ($end - $start) / 60;

        $totalPrice = ($durationInMinutes / 60) * $space->hourly_price;

        
        $booking = $customer->bookings()->create([
            ...$validated,
            'total_price' => round($totalPrice, 2),
            'status' => 'Pending',
        ]);

        
        return response()->json([
            'message' => 'Booking created successfully.',
            'booking' => $booking
        ], 201);
    }

    //------------------------------------------------------------------------------------
    public function index()
    {
        $customer = auth()->user()->customer;

        if (!$customer) {
            return response()->json([
                'message' => 'Customer profile not found.'
            ], 404);
        }

        $bookings = $customer->bookings()
            ->with('space.center')
            ->latest()
            ->get();

        return response()->json([
            'message' => 'Bookings retrieved successfully.',
            'bookings' => $bookings
        ], 200);
    }

    //------------------------------------------------------------------------------------
    public function show($id)
    {
        $customer = auth()->user()->customer;

        if (!$customer) {
            return response()->json([
                'message' => 'Customer profile not found.'
            ], 404);
        }

        $booking = $customer->bookings()
            ->with('space.center')
            ->find($id);

        if (!$booking) {
            return response()->json([
                'message' => 'Booking not found.'
            ], 404);
        }

        return response()->json([
            'message' => 'Booking details retrieved successfully.',
            'booking' => $booking
        ], 200);
    }

    //------------------------------------------------------------------------------------

    public function cancel($id)
    {
        $customer = auth()->user()->customer;

        if (!$customer) {
            return response()->json([
                'message' => 'Customer profile not found.'
            ], 404);
        }

        $booking = $customer->bookings()->find($id);

        if (!$booking) {
            return response()->json([
                'message' => 'Booking not found.'
            ], 404);
        }

        if (!in_array($booking->status, ['pending', 'confirmed'])) {
            return response()->json([
                'message' => 'This booking cannot be cancelled.'
            ], 422);
        }
        $booking->update([
            'status' => 'cancelled'
        ]);

        return response()->json([
            'message' => 'Booking cancelled successfully.',
            'booking' => $booking
        ], 200);
    }
}
