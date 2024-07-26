<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DogApi;
use App\DogDb;
use App\Models\Breed;

/**
 * The purpose of the breed controller is to return breed data to the user
 * from the api or database. At the moment the controller has db and api 
 * logic but with more time I would add a handler to deal with what the data
 * source is. Then the controller just knows I want breed data and the handler
 * determines where it comes from. This can help with caching as I could add
 * more data sources such as File, Redi or Memcached depending on requirements
 * 
 */

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
     * Show a breed with all it's relationships.
     */
    public function showWithRelationships(string $breedId)
    {   
        $breed = Breed::find($breedId);
        $breedArray['breed'] = $breed->name;
        
        foreach($breed->parks as $park) {
            $breedArray['parks'][$park->id] = $park->name;
            /*
            This code is here because I had a thought that you might want the users
            associated to the parks the breeds were linked to as well. But having read the
            brief I've commented it out. 

            Same with below for parks as users
            
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
