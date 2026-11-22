<div class="col-md-2 sidebar p-3">

    <h5 class="text-white mb-4">
        <i class="bi bi-building"></i>
        Booking System
    </h5>

    <a href="{{ route('dashboard') }}">
        <i class="bi bi-grid me-2"></i>
        Dashboard
    </a>

    <a href="{{ route('centers.index') }}">
        <i class="bi bi-buildings me-2"></i>
        Centers
    </a>

    <a href="{{ route('spaces.index') }}">
        <i class="bi bi-door-open me-2"></i>
        Spaces
    </a>

    @if(auth()->user()->type === 'super_admin')
        <a href="{{ route('employees.index') }}">
            <i class="bi bi-people me-2"></i>
            Employees
        </a>
    @endif

    <a href="{{ route('bookings.index') }}">
        <i class="bi bi-calendar-check me-2"></i>
        Bookings
    </a>

</div>