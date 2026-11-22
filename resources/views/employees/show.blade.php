@extends('layouts.app')

@section('title', 'Employee Details')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold">Employee Details</h3>
        <p class="text-muted mb-0">View complete employee information</p>
    </div>

    <div>
        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">
            <i class="bi bi-pencil me-1"></i>
            Edit Employee
        </a>

        <a href="{{ route('employees.index') }}" class="btn btn-light">
            Back
        </a>
    </div>

</div>

<div class="card shadow-sm">
    <div class="card-body p-4">

        <div class="d-flex align-items-center mb-4">
            <i class="bi bi-person-circle text-mint fs-1 me-3"></i>

            <div>
                <h4 class="fw-bold mb-1">{{ $employee->user->name }}</h4>
                <span class="text-muted">{{ $employee->job_title }}</span>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6 mb-4">
                <small class="text-muted">Employee ID</small>
                <h6>{{ $employee->id }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Full Name</small>
                <h6>{{ $employee->user->name }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Email</small>
                <h6>{{ $employee->user->email }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Phone Number</small>
                <h6>{{ $employee->user->phone_number ?? 'Not specified' }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Address</small>
                <h6>{{ $employee->user->address ?? 'Not specified' }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Job Title</small>
                <h6>{{ $employee->job_title }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Hire Date</small>
                <h6>{{ $employee->hire_date }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Account Type</small>
                <h6>{{ $employee->user->type }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Created At</small>
                <h6>{{ $employee->created_at->format('Y-m-d H:i') }}</h6>
            </div>

            <div class="col-md-6 mb-4">
                <small class="text-muted">Last Updated</small>
                <h6>{{ $employee->updated_at->format('Y-m-d H:i') }}</h6>
            </div>

        </div>

    </div>
</div>

@endsection