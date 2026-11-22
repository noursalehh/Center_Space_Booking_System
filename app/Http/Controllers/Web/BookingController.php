<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Http\Requests\UpdateBookingStatusRequest;

class BookingController extends Controller
{
    
    public function index()
    {
        $bookings = Booking::with(['customer.user','space.center'])->get();

        return view('bookings.index', compact('bookings'));
    }

    
    public function show(Booking $booking)
    {
        $booking->load([
            'customer.user',
            'space.center'
        ]);

        return view('bookings.show', compact('booking'));
    }


    public function updateStatus(
        UpdateBookingStatusRequest $request,Booking $booking ) {
        $validated = $request->validated();

        if (in_array($booking->status, ['rejected', 'cancelled'])) {
            return redirect()->route('bookings.index')->with('error', 'This booking cannot be updated');
        }

        if ($validated['status'] === 'confirmed') {

            $overlappingBooking = Booking::where('space_id', $booking->space_id)
                ->where('booking_date', $booking->booking_date)
                ->where('status', 'confirmed')
                ->where('id', '!=', $booking->id)
                ->where('start_time', '<', $booking->end_time)
                ->where('end_time', '>', $booking->start_time)
                ->exists();

            if ($overlappingBooking) {
                return redirect()->route('bookings.index')->with('error', 'This space is already booked at this time');
            }
        }

        $booking->update([
            'status' => $validated['status']
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking status updated successfully');
    }
}