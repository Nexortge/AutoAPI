<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('autos', AutoController::class)
    ->parameters(['autos' => 'auto'])
    ->only(['index', 'show', 'store', 'update', 'destroy']);
Route::get('/autos', [AutoController::class, 'showParameters']);
