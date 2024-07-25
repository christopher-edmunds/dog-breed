<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DogApi;
use App\DogDb;
use App\Models\Breed;

class BreedController extends Controller
{
    /**
     * Show all breeds.
     */
    public function all(DogApi $dogApi, DogDb $dogDb)
    {
        
        $breeds = $dogApi->getAll();
        $dogDb->storeAllDogs($breeds);

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

    /**
     * Show a breed.
     */
    public function showWithRelationships(string $breedId)
    {
        $breed = Breed::find($breedId);
        $breedArray['breed'] = $breed->name;
        
        foreach($breed->parks as $park) {
            $breedArray['parks'][$park->id] = $park->name;
            /*
            if(count($park->users) > 0) {
                foreach($park->users as $user) {
                    $breedArray['users'][$user->id] = $user->name;
                }

            } 
            */
        }
        
        foreach($breed->users as $user) {
            $breedArray['users'][$user->id] = $user->name;
            /*
            if(count($user->parks) > 0) {
                foreach($user->parks as $park) {
                    $breedArray['parks'][$park->id] = $park->name;
                }

            } 
            */

        }
        return response()->json($breedArray);   
    }
}
