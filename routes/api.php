<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CenterController;
use App\Http\Controllers\Api\SpaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);


Route::middleware(['auth:sanctum', 'user.type:customer'])->group(function () {

    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::get('/myprofile', [ApiAuthController::class, 'myProfile']);


    Route::post('/bookings', [BookingController::class, 'store']);
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::get('/bookings/{id}', [BookingController::class, 'show']);
    Route::patch('/bookings/{id}/cancel', [BookingController::class, 'cancel']);
});

Route::get('/centers', [CenterController::class, 'index']);
Route::get('/centers/{id}', [CenterController::class, 'show']);

Route::get('/centers/{center_id}/spaces', [SpaceController::class, 'index']);
Route::get('/spaces/{id}', [SpaceController::class, 'show']);
