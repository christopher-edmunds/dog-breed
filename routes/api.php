<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BreedController;

Route::get('/breed', [BreedController::class, 'all']);
Route::get('/breed/random', [BreedController::class, 'random']);
Route::get('/breed/{breedId}', [BreedController::class, 'show']);
Route::get('/breed/{breedId}/image', [BreedController::class, 'image']);