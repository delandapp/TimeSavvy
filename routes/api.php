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
        Route::delete('/jadwal/{id}', [JadwalController::class, 'deleteJadwal']);
        Route::patch('/jadwal/{id}', [JadwalController::class, 'editJadwal']);
        Route::get('/hari', [JadwalController::class, 'getHari']);
        Route::get('/user', [AuthController::class, 'getUser']);
        Route::patch('/user/{id}', [AuthController::class, 'editUser']);
        Route::delete('/user/{id}', [AuthController::class, 'deleteUser']);
    });
});
