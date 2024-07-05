<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SepedaMotorController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::post('/login', [AuthController::class, 'login'])->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/users', [AuthController::class, 'users'])->middleware('auth:sanctum');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('sepedamod', [SepedaMotorController::class, 'index'])->middleware('auth:sanctum');
Route::post('sepedamod', [SepedaMotorController::class, 'store'])->middleware('auth:sanctum');
Route::get('sepedamod/{id}', [SepedaMotorController::class, 'show'])->middleware('auth:sanctum');
Route::post('sepedamod/{id}', [SepedaMotorController::class, 'update'])->middleware('auth:sanctum');
Route::delete('sepedamod/{id}', [SepedaMotorController::class, 'destroy'])->middleware('auth:sanctum');
Route::post('send/reset', [AuthController::class, 'reset'])->middleware('auth:sanctum');
Route::post('send/email', [AuthController::class, 'sendResetLinkEmail'])->middleware('auth:sanctum');