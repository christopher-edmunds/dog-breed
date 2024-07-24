<?php

namespace App;

use App\Models\Breed;

class DogDb
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function storeAllDogs($dogs) {
        
        $dogsArray = [];
        foreach($dogs as $key => $value) {

            $dogsArray[] = ['name'=>$key, 'sub_breed'=>\json_encode($value)];
            
            
        }

        Breed::upsert($dogsArray, uniqueBy: ['name'], update: ['name', 'sub_breed']);
    }
}
