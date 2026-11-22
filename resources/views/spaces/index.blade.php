@extends('layouts.app')

@section('title', 'Spaces')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold">Spaces</h3>
        <p class="text-muted mb-0">Manage all center spaces</p>
    </div>

    <a href="{{ route('spaces.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i>
        Add Space
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Space Name</th>
                        <th>Center</th>
                        <th>Type</th>
                        <th>Capacity</th>
                        <th>Hourly Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($spaces as $space)

                        <tr>
                            <td>{{ $space->id }}</td>

                            <td class="fw-semibold">
                                {{ $space->name }}
                            </td>

                            <td>
                                {{ $space->center->name }}
                            </td>

                            <td>{{ $space->type }}</td>

                            <td>{{ $space->maximum_capacity }}</td>

                            <td>
                                ${{ number_format($space->hourly_price, 2) }}
                            </td>

                            <td>
                                @if($space->status === 'available')
                                    <span class="badge bg-success">Available</span>
                                @else
                                    <span class="badge bg-warning text-dark">Maintenance</span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex gap-2">

                                    <a href="{{ route('spaces.show', $space->id) }}"
                                       class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('spaces.edit', $space->id) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('spaces.destroy', $space->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this space?')">

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
                            <td colspan="8" class="text-center text-muted py-4">
                                No spaces found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

    </div>
</div>

@endsection