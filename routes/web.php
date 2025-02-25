<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

Route::get('/destination', [DestinationController::class,'index'])->name('destination.index');
Route::get('/destination/show/{destination}', [DestinationController::class,'show'])->name('destination.show');
Route::post('/destination/store', [DestinationController::class,'store'])->name('destination.store');

Route::get('/tour', [TourController::class,'index'])->name('tour.index');
Route::get('/tour/store', [TourController::class,'store'])->name('tour.store');
Route::get('/reservation', [ReservationController::class,'index'])->name('reservation.index');
Route::get('/reservation/show/{reservation}', [ReservationController::class,'show'])->name('reservation.show');
Route::get('/reservation/store', [ReservationController::class,'store'])->name('reservation.store');

});
