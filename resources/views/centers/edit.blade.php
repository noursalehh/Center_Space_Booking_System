@extends('layouts.app')

@section('title', 'Edit Center')

@section('content')

    <div class="mb-4">
        <h2 class="fw-bold">Edit Center</h2>
        <p class="text-muted">Update center information</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('centers.update', $center->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Center Name</label>

                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $center->name) }}">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Contact Number -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Contact Number</label>

                        <input type="text" name="contact_number"
                               class="form-control @error('contact_number') is-invalid @enderror"
                               value="{{ old('contact_number', $center->contact_number) }}">

                        @error('contact_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="col-12 mb-3">
                        <label class="form-label fw-semibold">Description</label>

                        <textarea name="description" rows="3"
                                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $center->description) }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="col-12 mb-3">
                        <label class="form-label fw-semibold">Address</label>

                        <input type="text" name="address"
                               class="form-control @error('address') is-invalid @enderror"
                               value="{{ old('address', $center->address) }}">

                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- City -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">City</label>

                        <input type="text" name="city"
                               class="form-control @error('city') is-invalid @enderror"
                               value="{{ old('city', $center->city) }}">

                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Country -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Country</label>

                        <input type="text" name="country"
                               class="form-control @error('country') is-invalid @enderror"
                               value="{{ old('country', $center->country) }}">

                        @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Latitude -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Latitude</label>

                        <input type="number" step="any" name="latitude"
                               class="form-control @error('latitude') is-invalid @enderror"
                               value="{{ old('latitude', $center->latitude) }}">

                        @error('latitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Longitude -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Longitude</label>

                        <input type="number" step="any" name="longitude"
                               class="form-control @error('longitude') is-invalid @enderror"
                               value="{{ old('longitude', $center->longitude) }}">

                        @error('longitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-semibold">Status</label>

                        <select name="status"
                                class="form-select @error('status') is-invalid @enderror">

                            <option value="active"
                                {{ old('status', $center->status) == 'active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="inactive"
                                {{ old('status', $center->status) == 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-lg me-1"></i>
                        Update Center
                    </button>

                    <a href="{{ route('centers.index') }}" class="btn btn-light border px-4">
                        Cancel
                    </a>

                </div>

            </form>

        </div>
    </div>

@endsection