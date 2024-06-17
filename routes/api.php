<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\AuthenticationController;

// Protected route to get the authenticated user's details
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Auto resource routes protected by Sanctum authentication middleware
Route::apiResource('autos', AutoController::class)
    ->parameters(['autos' => 'auto'])
    ->only(['index', 'show', 'store', 'update', 'destroy'])
    ->middleware('auth:sanctum');

// Additional routes for the AutoController
Route::get('/autos', [AutoController::class, 'showParameters'])->middleware('auth:sanctum');

// Authentication routes
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [AuthenticationController::class, 'register']);


