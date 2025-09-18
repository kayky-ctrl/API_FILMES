<?php

use App\Http\Controllers\GenresController;
use App\Http\Controllers\MoviesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/movies', MoviesController::class);

Route::apiResource('/genres', GenresController::class);

