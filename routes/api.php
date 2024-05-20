<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('/auth')->group(function () {
   Route::post('/login', [AuthController::class, 'authLogin']); 
   Route::post('/register', [AuthController::class, 'authRegister']); 
});

Route::prefix('/users')->group(function () {
    Route::get('/jadwal', [JadwalController::class, 'jadwal']);
})->middleware('auth:sanctum');

