<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BreedController extends Controller
{
    /**
     * Show all breeds.
     */
    public function all()
    {
        return 'all breeds';
        
    }

    /**
     * Show a breed.
     */
    public function show(string $breed_id)
    {
        return 'Breed '.$breed_id;
        
    }

    /**
     * Show a random breed.
     */
    public function random()
    {
        return 'Random breed';
        
    }

    /**
     * Show an image for a breed.
     */
    public function image(string $breed_id)
    {
        return 'I will return an image for Breed '.$breed_id;
        
    }
}
