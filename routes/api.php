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

Route::get('sepedamod', [SepedaMotorController::class, 'index'])->middleware('auth:sanctum');
Route::post('sepedamod', [SepedaMotorController::class, 'store'])->middleware('auth:sanctum');
Route::get('sepedamod/{id}', [SepedaMotorController::class, 'show']);
Route::put('sepedamod/{id}', [SepedaMotorController::class, 'update']);
Route::delete('sepedamod/{id}', [SepedaMotorController::class, 'destroy']);