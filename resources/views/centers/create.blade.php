@extends('layouts.app')

@section('title', 'Add Center')

@section('content')

    <!-- Page Header -->
    <div class="mb-4">
        <h2 class="fw-bold">Add New Center</h2>
        <p class="text-muted">Enter the center information below</p>
    </div>

    <!-- Center Form -->
    <div class="card shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route('centers.store') }}" method="POST">

                @csrf

                <div class="row">

                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Center Name</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            placeholder="Enter center name"
                        >

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Contact Number -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Contact Number</label>

                        <input
                            type="text"
                            name="contact_number"
                            class="form-control @error('contact_number') is-invalid @enderror"
                            value="{{ old('contact_number') }}"
                            placeholder="Enter contact number"
                        >

                        @error('contact_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="col-12 mb-3">
                        <label class="form-label fw-semibold">Description</label>

                        <textarea
                            name="description"
                            rows="3"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Enter center description"
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="col-12 mb-3">
                        <label class="form-label fw-semibold">Address</label>

                        <input
                            type="text"
                            name="address"
                            class="form-control @error('address') is-invalid @enderror"
                            value="{{ old('address') }}"
                            placeholder="Enter full address"
                        >

                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- City -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">City</label>

                        <input
                            type="text"
                            name="city"
                            class="form-control @error('city') is-invalid @enderror"
                            value="{{ old('city') }}"
                            placeholder="Enter city"
                        >

                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                <!-- Country -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Country</label>

                        <input
                            type="text"
                            name="country"
                            class="form-control @error('country') is-invalid @enderror"
                            value="{{ old('country') }}"
                            placeholder="Enter country"
                        >

                        @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Latitude -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Latitude</label>

                        <input
                            type="number"
                            step="any"
                            name="latitude"
                            class="form-control @error('latitude') is-invalid @enderror"
                            value="{{ old('latitude') }}"
                            placeholder="Enter latitude"
                        >

                        @error('latitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Longitude -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Longitude</label>

                        <input
                            type="number"
                            step="any"
                            name="longitude"
                            class="form-control @error('longitude') is-invalid @enderror"
                            value="{{ old('longitude') }}"
                            placeholder="Enter longitude"
                        >

                        @error('longitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-semibold">Status</label>

                        <select
                            name="status"
                            class="form-select @error('status') is-invalid @enderror"
                        >
                            <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>

                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!-- Buttons -->
                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-lg me-1"></i>
                        Save Center
                    </button>

                    <a href="{{ route('centers.index') }}" class="btn btn-light border px-4">
                        Cancel
                    </a>

                </div>

            </form>

        </div>
    </div>

@endsection