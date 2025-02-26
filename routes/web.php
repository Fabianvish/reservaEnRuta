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
    Route::get('/admin', function () {
        return view('dashboard');
    })->name('dashboard');

Route::get('/admin/destination', [DestinationController::class,'index'])->name('destination.index');
Route::get('/admin/destination/create', [DestinationController::class,'create'])->name('destination.create');
Route::get('/admin/destination/edit/{destination}', [DestinationController::class,'edit'])->name('destination.edit');
Route::get('/admin/destination/show/{destination}', [DestinationController::class,'show'])->name('destination.show');

Route::get('/admin/tour', [TourController::class,'index'])->name('tour.index');
Route::get('/admin/tour/create', [TourController::class,'create'])->name('tour.create');
Route::get('/admin/tour/edit/{tour}', [TourController::class,'edit'])->name('tour.edit');
Route::get('/admin/tour/show/{tour}', [TourController::class,'show'])->name('tour.show');

Route::get('/admin/reservation', [ReservationController::class,'index'])->name('reservation.index');
Route::get('/admin/reservation/create', [ReservationController::class,'create'])->name('reservation.create');
Route::get('/admin/reservation/show/{reservation}', [ReservationController::class,'show'])->name('reservation.show');

});
