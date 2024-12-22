<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BuildingController;
use App\Http\Controllers\Api\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/rooms', [RoomController::class, 'index']);
    Route::get('/room/{id}', [RoomController::class, 'show']);
    Route::get('/buildings', [BuildingController::class, 'index']);
    Route::get('/building/{id}', [BuildingController::class, 'show']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
