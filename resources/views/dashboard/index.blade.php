@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <!-- Page Title -->
    <div class="mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <p class="text-muted">Welcome to Booking Management System</p>
    </div>

    <!-- Main Statistics -->
    <div class="row g-4 mb-4">

        <!-- Centers -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm p-3">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="text-muted mb-1">Total Centers</p>
                        <h3 class="fw-bold">{{ $centersCount }}</h3>
                    </div>

                    <div class="bg-mint-light text-mint rounded-3 p-3 fs-3">
                        <i class="bi bi-buildings"></i>
                    </div>

                </div>
            </div>
        </div>

        <!-- Spaces -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm p-3">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="text-muted mb-1">Total Spaces</p>
                        <h3 class="fw-bold">{{ $spacesCount }}</h3>
                    </div>

                    <div class="bg-mint-light text-mint rounded-3 p-3 fs-3">
                        <i class="bi bi-door-open"></i>
                    </div>

                </div>
            </div>
        </div>

        <!-- Employees -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm p-3">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="text-muted mb-1">Total Employees</p>
                        <h3 class="fw-bold">{{ $employeesCount }}</h3>
                    </div>

                    <div class="bg-mint-light text-mint rounded-3 p-3 fs-3">
                        <i class="bi bi-people"></i>
                    </div>

                </div>
            </div>
        </div>

        <!-- Customers -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm p-3">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="text-muted mb-1">Total Customers</p>
                        <h3 class="fw-bold">{{ $customersCount }}</h3>
                    </div>

                    <div class="bg-mint-light text-mint rounded-3 p-3 fs-3">
                        <i class="bi bi-person-check"></i>
                    </div>

                </div>
            </div>
        </div>

        <!-- Bookings -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm p-3">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="text-muted mb-1">Total Bookings</p>
                        <h3 class="fw-bold">{{ $bookingsCount }}</h3>
                    </div>

                    <div class="bg-mint-light text-mint rounded-3 p-3 fs-3">
                        <i class="bi bi-calendar-check"></i>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <!-- Booking Status -->
    <h4 class="fw-bold mb-3">Bookings Overview</h4>

    <div class="row g-4">

        <!-- Pending -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm p-3 border-start border-warning border-4">
                <p class="text-muted mb-1">Pending</p>
                <h3 class="fw-bold">{{ $pendingBookings }}</h3>
                <span class="badge bg-warning text-dark">Waiting for review</span>
            </div>
        </div>
    <!-- Confirmed -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm p-3 border-start border-success border-4">
                <p class="text-muted mb-1">Confirmed</p>
                <h3 class="fw-bold">{{ $confirmedBookings }}</h3>
                <span class="badge bg-success">Approved bookings</span>
            </div>
        </div>

        <!-- Rejected -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm p-3 border-start border-danger border-4">
                <p class="text-muted mb-1">Rejected</p>
                <h3 class="fw-bold">{{ $rejectedBookings }}</h3>
                <span class="badge bg-danger">Rejected bookings</span>
            </div>
        </div>

        <!-- Cancelled -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm p-3 border-start border-secondary border-4">
                <p class="text-muted mb-1">Cancelled</p>
                <h3 class="fw-bold">{{ $cancelledBookings }}</h3>
                <span class="badge bg-secondary">Cancelled bookings</span>
            </div>
        </div>

    </div>

@endsection