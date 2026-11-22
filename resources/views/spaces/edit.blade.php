@extends('layouts.app')

@section('title', 'Edit Space')

@section('content')

<div class="mb-4">
    <h3 class="fw-bold">Edit Space</h3>
    <p class="text-muted">Update space information</p>
</div>

<div class="card shadow-sm">
    <div class="card-body p-4">

        <form action="{{ route('spaces.update', $space->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Space Name</label>

                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $space->name) }}"
                           placeholder="Enter space name">

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Space Type</label>

                    <input type="text"
                           name="type"
                           class="form-control @error('type') is-invalid @enderror"
                           value="{{ old('type', $space->type) }}"
                           placeholder="Meeting Room, Coworking...">

                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Description</label>

                    <textarea name="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="3"
                              placeholder="Enter space description">{{ old('description', $space->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Center</label>

                    <select name="center_id"
                            class="form-select @error('center_id') is-invalid @enderror">

                        <option value="">Select Center</option>

                        @foreach($centers as $center)
                            <option value="{{ $center->id }}"
                                {{ old('center_id', $space->center_id) == $center->id ? 'selected' : '' }}>
                                {{ $center->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('center_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Maximum Capacity</label>

                    <input type="number"
                           name="maximum_capacity"
                           class="form-control @error('maximum_capacity') is-invalid @enderror"
                           value="{{ old('maximum_capacity', $space->maximum_capacity) }}"
                           min="1"
                           placeholder="Enter maximum capacity">

                    @error('maximum_capacity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Hourly Price</label>

                    <input type="number"
name="hourly_price"
                           class="form-control @error('hourly_price') is-invalid @enderror"
                           value="{{ old('hourly_price', $space->hourly_price) }}"
                           min="0"
                           step="0.01"
                           placeholder="Enter hourly price">

                    @error('hourly_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>

                    <select name="status"
                            class="form-select @error('status') is-invalid @enderror">

                        <option value="available"
                            {{ old('status', $space->status) == 'available' ? 'selected' : '' }}>
                            Available
                        </option>

                        <option value="maintenance"
                            {{ old('status', $space->status) == 'maintenance' ? 'selected' : '' }}>
                            Maintenance
                        </option>

                    </select>

                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-1"></i>
                    Update Space
                </button>

                <a href="{{ route('spaces.index') }}" class="btn btn-light">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>

@endsection