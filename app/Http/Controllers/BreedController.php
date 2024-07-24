<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DogApi;

class BreedController extends Controller
{
    /**
     * Show all breeds.
     */
    public function all(DogApi $dogApi)
    {
        
        $breeds = $dogApi->getAll();
        return response()->json($breeds);
        
    }

    /**
     * Show a breed.
     */
    public function show(string $breedId, DogApi $dogApi)
    {
        $breed = $dogApi->getOne($breedId);
        return response()->json($breed);   
    }

    /**
     * Show a random breed.
     */
    public function random(DogApi $dogApi)
    {
        $breed = $dogApi->getRandom();
        return response()->json($breed);
        
    }

    /**
     * Show an image for a breed.
     */
    public function image(string $breedId, DogApi $dogApi)
    {
        $breed = $dogApi->getImage($breedId);
        return response()->json($breed);
        
    }
}
