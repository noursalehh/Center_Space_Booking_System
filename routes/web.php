<?php

use App\Http\Controllers\Web\BookingController;
use App\Http\Controllers\Web\CenterController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\EmployeeController;
use App\Http\Controllers\Web\SpaceController;
use App\Http\Controllers\Web\WebAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [WebAuthController::class, 'loginForm'])->name('login');
Route::post('/login', [WebAuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [WebAuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'user.type:super_admin,employee'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/centers', [CenterController::class, 'index'])->name('centers.index');
    Route::get('/centers/create', [CenterController::class, 'create'])->name('centers.create');
    Route::post('/centers', [CenterController::class, 'store'])->name('centers.store');
    Route::get('/centers/{center}', [CenterController::class, 'show'])->name('centers.show');
    Route::get('/centers/{center}/edit', [CenterController::class, 'edit'])->name('centers.edit');
    Route::put('/centers/{center}', [CenterController::class, 'update'])->name('centers.update');
    Route::delete('/centers/{center}', [CenterController::class, 'destroy'])->name('centers.destroy');

    Route::get('/spaces', [SpaceController::class, 'index'])->name('spaces.index');
    Route::get('/spaces/create', [SpaceController::class, 'create'])->name('spaces.create');
    Route::post('/spaces', [SpaceController::class, 'store'])->name('spaces.store');
    Route::get('/spaces/{space}', [SpaceController::class, 'show'])->name('spaces.show');
    Route::get('/spaces/{space}/edit', [SpaceController::class, 'edit'])->name('spaces.edit');
    Route::put('/spaces/{space}', [SpaceController::class, 'update'])->name('spaces.update');
    Route::delete('/spaces/{space}', [SpaceController::class, 'destroy'])->name('spaces.destroy');

    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::patch('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');
});

Route::middleware(['auth', 'user.type:super_admin'])->group(function () {

    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});
