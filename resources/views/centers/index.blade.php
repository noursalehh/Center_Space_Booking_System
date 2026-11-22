@extends('layouts.app')

@section('title', 'Centers')

@section('content')

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">Centers</h2>
            <p class="text-muted mb-0">Manage all company centers</p>
        </div>

        <a href="{{ route('centers.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Add Center
        </a>

    </div>


    <!-- Centers Table -->
    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Contact Number</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($centers as $center)

                            <tr>

                                <td>{{ $center->id }}</td>

                                <td class="fw-semibold">
                                    {{ $center->name }}
                                </td>

                                <td>{{ $center->city }}</td>

                                <td>{{ $center->country }}</td>

                                <td>{{ $center->contact_number }}</td>

                                <td>
                                    @if($center->status === 'active')
                                        <span class="badge bg-success">
                                            Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex gap-2">

                                        <!-- Show -->
                                        <a href="{{ route('centers.show', $center->id) }}"
                                           class="btn btn-sm btn-outline-info"
                                           title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <!-- Edit -->
                                        <a href="{{ route('centers.edit', $center->id) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('centers.destroy', $center->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this center?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>
</tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    No centers found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection