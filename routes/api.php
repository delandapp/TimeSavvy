<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/auth')->group(function () {
    Route::post('/login', [AuthController::class, 'authLogin']);
    Route::post('/register', [AuthController::class, 'authRegister']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/jadwal', [JadwalController::class, 'getJadwal']);
        Route::post('/jadwal', [JadwalController::class, 'createJadwal']);
        Route::get('/hari', [JadwalController::class, 'getHari']);
    });
});
