@extends('layouts.app')

@section('title', 'Booking Details')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold">Booking Details</h3>
            <p class="text-muted mb-0">
                Review booking information and update its status
            </p>
        </div>

        <a href="{{ route('bookings.index') }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">
                Booking #{{ $booking->id }}
            </h5>
        </div>

        <div class="card-body">

            <h5 class="fw-bold mb-3">Customer Information</h5>

            <div class="row mb-4">

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Customer Name</label>
                    <p class="fw-semibold">
                        {{ $booking->customer->user->name }}
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Email</label>
                    <p class="fw-semibold">
                        {{ $booking->customer->user->email }}
                    </p>
                </div>

            </div>

            <hr>

            <h5 class="fw-bold mb-3">Space Information</h5>

            <div class="row mb-4">

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Space Name</label>
                    <p class="fw-semibold">
                        {{ $booking->space->name }}
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Center Name</label>
                    <p class="fw-semibold">
                        {{ $booking->space->center->name }}
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Space Type</label>
                    <p class="fw-semibold">
                        {{ $booking->space->type }}
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Hourly Price</label>
                    <p class="fw-semibold">
                        ${{ number_format($booking->space->hourly_price, 2) }}
                    </p>
                </div>

            </div>

            <hr>

            <h5 class="fw-bold mb-3">Booking Information</h5>

            <div class="row mb-4">

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Booking Date</label>
                    <p class="fw-semibold">
                        {{ $booking->booking_date }}
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Number of People</label>
                    <p class="fw-semibold">
                        {{ $booking->number_of_people }}
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Start Time</label>
                    <p class="fw-semibold">
                        {{ $booking->start_time }}
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="text-muted">End Time</label>
                    <p class="fw-semibold">
                        {{ $booking->end_time }}
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Total Price</label>
                    <p class="fw-bold text-success">
                        ${{ number_format($booking->total_price, 2) }}
                    </p>
                </div>
    <div class="col-md-6 mb-3">
                    <label class="text-muted">Current Status</label>

                    <p>
                        @if($booking->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>

                        @elseif($booking->status == 'confirmed')
                            <span class="badge bg-success">Confirmed</span>

                        @elseif($booking->status == 'rejected')
                            <span class="badge bg-danger">Rejected</span>

                        @else
                            <span class="badge bg-secondary">Cancelled</span>
                        @endif
                    </p>
                </div>

            </div>

            <hr>

            @if($booking->status == 'pending')

                <h5 class="fw-bold mb-3">Review Booking</h5>

                <form action="{{ route('bookings.updateStatus', $booking->id) }}"
                      method="POST">

                    @csrf
                    @method('PATCH')

                    <div class="mb-3">

                        <label class="form-label">Booking Status</label>

                        <select name="status"
                                class="form-select @error('status') is-invalid @enderror">

                            <option value="">Select Status</option>

                            <option value="confirmed"
                                {{ old('status') == 'confirmed' ? 'selected' : '' }}>
                                Confirm
                            </option>

                            <option value="rejected"
                                {{ old('status') == 'rejected' ? 'selected' : '' }}>
                                Reject
                            </option>

                        </select>

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Update Booking
                    </button>

                </form>

            @else

                <div class="alert alert-info mb-0">
                    This booking has already been reviewed or cancelled.
                    Its status cannot be changed here.
                </div>

            @endif

        </div>
    </div>

</div>

@endsection