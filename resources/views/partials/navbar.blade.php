<nav class="navbar bg-white shadow-sm rounded-3 px-4 mb-4">

    <span class="navbar-brand fw-semibold">
        Management Dashboard
    </span>

    <div class="d-flex align-items-center">

        <span class="me-3">
            <i class="bi bi-person-circle text-mint"></i>
            {{ auth()->user()->name }}
        </span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>
        </form>

    </div>

</nav>