<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\ParkController;
use App\Http\Controllers\UserController;

/*
I have installed the api route for laravel so all api calls start with /api followed by the below
With more time I would add rate limiting / throttling to these routes to prevent them being overused
and to prevent any issues with the dog.ceo api

I've used get and post methods based on the spec of the test

*/

Route::get('/breed', [BreedController::class, 'all']);
Route::get('/breed/random', [BreedController::class, 'random']);
Route::get('/breed/{breedId}', [BreedController::class, 'show']);
Route::get('/breed/{breedId}/image', [BreedController::class, 'image']);
Route::get('/breed/{breedId}/data', [BreedController::class, 'showWithRelationships']);

Route::post('/user/{userId}/associate', [UserController::class, 'associate']);
Route::post('/park/{parkId}/breed', [ParkController::class, 'breed']);