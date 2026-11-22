@extends('layouts.app')

@section('title', 'Employees')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold">Employees</h3>
        <p class="text-muted mb-0">Manage company employees</p>
    </div>

    <a href="{{ route('employees.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i>
        Add Employee
    </a>

</div>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Job Title</th>
                        <th>Hire Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($employees as $employee)

                        <tr>

                            <td>{{ $employee->id }}</td>

                            <td class="fw-semibold">
                                {{ $employee->user->name }}
                            </td>

                            <td>{{ $employee->user->email }}</td>

                            <td>{{ $employee->job_title }}</td>

                            <td>{{ $employee->hire_date }}</td>

                            <td>
                                <div class="d-flex gap-2">

                                    <a href="{{ route('employees.show', $employee->id) }}"
                                       class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('employees.edit', $employee->id) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('employees.destroy', $employee->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this employee?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                No employees found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
</div>

@endsection