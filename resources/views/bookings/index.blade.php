@extends('layouts.app')

@section('title', 'Bookings')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Bookings</h3>
            <p class="text-muted mb-0">Manage and review customer bookings</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Space</th>
                            <th>Center</th>
                            <th>Booking Date</th>
                            <th>Time</th>
                            <th>People</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($bookings as $booking)

                            <tr>
                                <td>{{ $booking->id }}</td>

                                <td>
                                    {{ $booking->customer->user->name }}
                                </td>

                                <td>
                                    {{ $booking->space->name }}
                                </td>

                                <td>
                                    {{ $booking->space->center->name }}
                                </td>

                                <td>
                                    {{ $booking->booking_date }}
                                </td>

                                <td>
                                    {{ $booking->start_time }} -
                                    {{ $booking->end_time }}
                                </td>

                                <td>
                                    {{ $booking->number_of_people }}
                                </td>

                                <td>
                                    ${{ number_format($booking->total_price, 2) }}
                                </td>

                                <td>
                                    @if($booking->status == 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>

                                    @elseif($booking->status == 'confirmed')
                                        <span class="badge bg-success">Confirmed</span>

                                    @elseif($booking->status == 'rejected')
                                        <span class="badge bg-danger">Rejected</span>

                                    @else
                                        <span class="badge bg-secondary">Cancelled</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('bookings.show', $booking->id) }}"
                                       class="btn btn-sm btn-outline-success">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="10" class="text-center text-muted py-4">
                                    No bookings found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection