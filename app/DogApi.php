<?php

namespace App;

use Illuminate\Support\Facades\Http;
/*
The purpose of the DogApi class is to manage any api tasks related to the dog 
api so that the controllers don't need to know about api functionality. They only need to know
that something will get them dog data from somewhere.  
*/

class DogApi
{
    //Move this to a config file
    private string $baseUrl = 'https://dog.ceo/api/';
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /*
    Return all breeds from api
    */

    public function getAll() {
        $response = Http::get($this->baseUrl.'breeds/list/all');
        return $response['message'];

    }

    /*
    Return one breed from api
    */
    public function getOne(string $breedId) {
        $response = Http::get($this->baseUrl.'breed/'.$breedId.'/images');
        return $response['message'];

    }

    /*
    Return random breeds from api
    */

    public function getRandom() {
        $response = Http::get($this->baseUrl.'breeds/image/random');
        return $response['message'];

    }

    /*
    Return an image from the api
    */

    public function getImage(string $breedId) {
        $response = Http::get($this->baseUrl.'breed/'.$breedId.'/images/random');
        return $response['message'];

    }
}
