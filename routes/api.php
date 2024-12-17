<?php

use App\Http\Controllers\ApplicationSurveyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyQuestionController;
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
    Route::apiResource('survey', SurveyController::class);
    Route::post('survey/{survey}/addQuestion', [SurveyController::class, 'addQuestion']);
    Route::apiResource('questions', SurveyQuestionController::class);
    Route::apiResource('schools', SchoolController::class);
    Route::apiResource('applicationSurveys', ApplicationSurveyController::class);
});
