<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Booking System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fffbfb;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 16px;
            
        }

        .login-icon {
            width: 65px;
            height: 65px;
            background-color: #EAF8F4;
            color: #42BFA3;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            margin: auto;
        }

        .btn-login {
            background-color: #42BFA3;
            color: white;
            border: none;
        }

        .btn-login:hover {
            background-color: #2FA88E;
            color: white;
        }

        .form-control:focus {
            border-color: #42BFA3;
            box-shadow: 0 0 0 0.2rem rgba(66, 191, 163, 0.2);
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="card login-card shadow p-4 mx-auto">

            <div class="text-center mb-4">

                <div class="login-icon mb-3">
                    <i class="bi bi-building"></i>
                </div>

                <h3 class="fw-bold">Welcome Back</h3>

                <p class="text-muted">
                    Login to your management account
                </p>

            </div>

            <form action="{{ route('login.submit') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">Email Address</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter your email"
                        value="{{ old('email') }}"
                    >

                    @error('email')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-4">

                    <label class="form-label">Password</label>

                    <input
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Enter your password"
                    >

                    @error('password')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <button type="submit" class="btn btn-login w-100 py-2">
                    Login
                </button>

            </form>

        </div>

    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</body>
</html>