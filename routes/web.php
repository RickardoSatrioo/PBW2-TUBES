<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('room');
    // return view('home');
});
Route::get('/after-auth', function () {
    return view('after-auth');
});
Route::get('/landing', function () {
    return view('landing');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::name('user.')->group(function() {
        Route::get('/room/{id}', function () {
            return view('room');
        })->name('room');
        Route::get('/reservation', function () {
            return view('reservation');
        })->name('reservation');
        Route::get('/reservation', function () {
            return view('history-reservation');
        })->name('history_reservation');
    });

    // Route::prefix('admin')->name('admin.')->group(function() {
    //     Route::get('/verif-reservation', function () {
    //         return view('room');
    //     })->name('admin.verif-reservation');
    //     Route::post('/make-reservation', [ReservationController::class, 'makeReservation'])->name('make_reservation');
    // });
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/verif-reservation', function () {
        return view('room');
    })->name('admin.verif-reservation');
    Route::post('/make-reservation', [ReservationController::class, 'makeReservation'])->name('make_reservation');
});
require __DIR__.'/auth.php';
