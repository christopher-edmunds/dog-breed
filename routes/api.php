<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\ParkController;
use App\Http\Controllers\UserController;

Route::get('/breed', [BreedController::class, 'all']);
Route::get('/breed/random', [BreedController::class, 'random']);
Route::get('/breed/{breedId}', [BreedController::class, 'show']);
Route::get('/breed/{breedId}/image', [BreedController::class, 'image']);

Route::post('/user/{userId}/associate', [UserController::class, 'associate']);
Route::post('/park/{parkId}/breed', [ParkController::class, 'breed']);