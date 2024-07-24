<?php

use Illuminate\Support\Facades\Route;
use App\Classes\DogApi;

Route::get('/breed', function (DogApi $dogApi) {
    $dogApi->getAll();
    // ...
});
