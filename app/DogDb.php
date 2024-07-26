<?php

namespace App;

use App\Models\Breed;

/*
The purpose of the DogDb class is to manage any database tasks related to the dog 
data so that it is not in the controllers. With more time I would have added the functionality
to replicate all the api calls in here so that the db is checked first before making api calls
to improve performance. So a retrieve all, retrieve random, retrieve image. 
*/

class DogDb
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Store all dos in the database
     */

    public function storeAllDogs($dogs) {
        
        $dogsArray = [];
        foreach($dogs as $key => $value) {
            //For the purpose of the test I have stored sub-breeds as a json string. Mainly because I wasn't
            //sure what they would be used for. With more time or better understanding of how they would be used
            //I would store them in another database and link them via a one to many relationship or iterate through
            //each one and store them as a separate breed.
            $dogsArray[] = ['name'=>$key, 'sub_breed'=>\json_encode($value)];
            
            
        }

        //I am storing all the dogs in the database and updating any that need it. It feels like a bit of a brute force
        //way of doing it that might cause me problems in the future. I have done limited testing on it and am happy it
        //adds the dogs to the database but haven't had time to test the update functionality. 
        //To improve this functionality I would either add this to a queue or put this functionality in a console funciton
        //that runs every hour or day depending on requirements. I certainly wouldn't leave this in an api call like this
        //in production as it would cause issues with performence returing the api data to the user as the dog.ceo api grows
        Breed::upsert($dogsArray, uniqueBy: ['name'], update: ['name', 'sub_breed']);
    }
}
