<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::apiResource('roles', RoleController::class);
    Route::apiResource('profiles', ProfileController::class);
    Route::apiResource('users', UserController::class);
});
