@extends('layouts.app')

@section('title', 'Center Details')

@section('content')

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">Center Details</h2>
            <p class="text-muted mb-0">View complete center information</p>
        </div>

        <a href="{{ route('centers.index') }}" class="btn btn-light border">
            <i class="bi bi-arrow-left me-1"></i>
            Back to Centers
        </a>

    </div>

    <!-- Center Information -->
    <div class="card shadow-sm">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h4 class="fw-bold mb-0">
                    {{ $center->name }}
                </h4>

                @if($center->status === 'active')
                    <span class="badge bg-success fs-6">Active</span>
                @else
                    <span class="badge bg-secondary fs-6">Inactive</span>
                @endif

            </div>

            <div class="row g-4">

                <div class="col-md-6">
                    <p class="text-muted mb-1">Center ID</p>
                    <h6>{{ $center->id }}</h6>
                </div>

                <div class="col-md-6">
                    <p class="text-muted mb-1">Contact Number</p>
                    <h6>{{ $center->contact_number }}</h6>
                </div>

                <div class="col-12">
                    <p class="text-muted mb-1">Description</p>
                    <h6>{{ $center->description }}</h6>
                </div>

                <div class="col-12">
                    <p class="text-muted mb-1">Address</p>
                    <h6>{{ $center->address }}</h6>
                </div>

                <div class="col-md-6">
                    <p class="text-muted mb-1">City</p>
                    <h6>{{ $center->city }}</h6>
                </div>

                <div class="col-md-6">
                    <p class="text-muted mb-1">Country</p>
                    <h6>{{ $center->country }}</h6>
                </div>

                <div class="col-md-6">
                    <p class="text-muted mb-1">Latitude</p>
                    <h6>{{ $center->latitude ?? 'Not specified' }}</h6>
                </div>

                <div class="col-md-6">
                    <p class="text-muted mb-1">Longitude</p>
                    <h6>{{ $center->longitude ?? 'Not specified' }}</h6>
                </div>

                <div class="col-md-6">
                    <p class="text-muted mb-1">Created At</p>
                    <h6>{{ $center->created_at->format('Y-m-d H:i') }}</h6>
                </div>

                <div class="col-md-6">
                    <p class="text-muted mb-1">Last Updated</p>
                    <h6>{{ $center->updated_at->format('Y-m-d H:i') }}</h6>
                </div>

            </div>

            <hr class="my-4">

            <a href="{{ route('centers.edit', $center->id) }}"
               class="btn btn-primary px-4">

                <i class="bi bi-pencil me-1"></i>
                Edit Center

            </a>

        </div>

    </div>

@endsection