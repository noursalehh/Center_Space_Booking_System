@extends('layouts.app')

@section('title', 'Add Employee')

@section('content')

<div class="mb-4">
    <h3 class="fw-bold">Add New Employee</h3>
    <p class="text-muted">Create a new employee account</p>
</div>

<div class="card shadow-sm">
    <div class="card-body p-4">

        <form action="{{ route('employees.store') }}" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name</label>

                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="Enter employee name">

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>

                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}"
                           placeholder="Enter email address">

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Password</label>

                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Enter password">

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone Number</label>

                    <input type="text"
                           name="phone_number"
                           class="form-control @error('phone_number') is-invalid @enderror"
                           value="{{ old('phone_number') }}"
                           placeholder="Enter phone number">

                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Address</label>

                    <input type="text"
                           name="address"
                           class="form-control @error('address') is-invalid @enderror"
                           value="{{ old('address') }}"
                           placeholder="Enter employee address">

                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Job Title</label>

                    <input type="text"
                           name="job_title"
                           class="form-control @error('job_title') is-invalid @enderror"
                           value="{{ old('job_title') }}"
                           placeholder="e.g. Center Manager">

                    @error('job_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Hire Date</label>

                    <input type="date"
                           name="hire_date"
                           class="form-control @error('hire_date') is-invalid @enderror"
                           value="{{ old('hire_date') }}">
@error('hire_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="mt-3">

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-1"></i>
                    Save Employee
                </button>

                <a href="{{ route('employees.index') }}" class="btn btn-light">
                    Cancel
                </a>

            </div>

        </form>

    </div>
</div>

@endsection