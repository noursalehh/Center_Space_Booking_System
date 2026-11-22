<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Space;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        
        $centersCount = Center::count();

        $spacesCount = Space::count();

        $employeesCount = Employee::count();

        $customersCount = Customer::count();

        $bookingsCount = Booking::count();

        
        $pendingBookings = Booking::where('status', 'pending')->count();

        $confirmedBookings = Booking::where('status', 'confirmed')->count();

        $rejectedBookings = Booking::where('status', 'rejected')->count();

        $cancelledBookings = Booking::where('status', 'cancelled')->count();

        return view('dashboard.index', compact(
            'centersCount',
            'spacesCount',
            'employeesCount',
            'customersCount',
            'bookingsCount',
            'pendingBookings',
            'confirmedBookings',
            'rejectedBookings',
            'cancelledBookings'
        ));
    }
}