<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Booking Management System')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --mint: #42BFA3;
            --mint-hover: #2FA88E;
            --mint-light: #EAF8F4;
            --dark-green: #17483E;
            --page-bg: #F6FAF8;
            --text-color: #263B36;
            --border-color: #E3EEE9;
        }

        body {
            background-color: var(--page-bg);
            color: var(--text-color);
            font-family: Arial, sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background-color: var(--dark-green);
        }

        .sidebar a {
            color: #EAF8F4;
            text-decoration: none;
            display: block;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 6px;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: var(--mint);
            color: white;
        }

        .main-content {
            padding: 25px;
        }

        .navbar {
            min-height: 65px;
        }

        .btn-primary,
        .btn-success {
            background-color: var(--mint);
            border-color: var(--mint);
            color: white;
        }

        .btn-primary:hover,
        .btn-success:hover {
            background-color: var(--mint-hover);
            border-color: var(--mint-hover);
            color: white;
        }

        .card {
            border: 1px solid var(--border-color);
            border-radius: 12px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--mint);
            box-shadow: 0 0 0 0.2rem rgba(66, 191, 163, 0.2);
        }

        .text-mint {
            color: var(--mint) !important;
        }

        .bg-mint-light {
            background-color: var(--mint-light) !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">