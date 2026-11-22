@extends('layouts.app')

@section('title', 'Space Details')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold">Space Details</h3>
        <p class="text-muted mb-0">View complete space information</p>
    </div>

    <div>
        <a href="{{ route('spaces.edit', $space->id) }}" class="btn btn-primary">
            <i class="bi bi-pencil me-1"></i>
            Edit Space
        </a>

        <a href="{{ route('spaces.index') }}" class="btn btn-light">
            Back
        </a>
    </div>

</div>

<div class="card shadow-sm">
    <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h4 class="fw-bold mb-0">{{ $space->name }}</h4>

            @if($space->status === 'available')
                <span class="badge bg-success fs-6">Available</span>
            @else
                <span class="badge bg-warning text-dark fs-6">Maintenance</span>
            @endif

        </div>

        <div class="row">

            <div class="col-md-6 mb-4">
                <small class="text-muted">Space ID</small>
                <h6>{{ $space->id }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Space Name</small>
                <h6>{{ $space->name }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Center</small>
                <h6>{{ $space->center->name }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Type</small>
                <h6>{{ $space->type }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Maximum Capacity</small>
                <h6>{{ $space->maximum_capacity }} People</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Hourly Price</small>
                <h6>${{ number_format($space->hourly_price, 2) }}</h6>
            </div>

            <div class="col-12 mb-4">
                <small class="text-muted">Description</small>
                <p>{{ $space->description ?? 'No description available' }}</p>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Created At</small>
                <h6>{{ $space->created_at->format('Y-m-d H:i') }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Last Updated</small>
                <h6>{{ $space->updated_at->format('Y-m-d H:i') }}</h6>
            </div>

        </div>

    </div>
</div>

@endsection