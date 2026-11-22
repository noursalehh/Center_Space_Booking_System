@include('partials.header')

@include('partials.sidebar')

<div class="col-md-10 p-3">

    @include('partials.navbar')

    <div class="main-content">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

      

        @yield('content')

    </div>

</div>

@include('partials.footer')