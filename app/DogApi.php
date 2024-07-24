<?php

namespace App;

use Illuminate\Support\Facades\Http;

class DogApi
{

    private string $baseUrl = 'https://dog.ceo/api/';
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAll() {
        $response = Http::get($this->baseUrl.'breeds/list/all');
        return $response['message'];

    }

    public function getOne(string $breedId) {
        $response = Http::get($this->baseUrl.'breed/'.$breedId.'/images');
        return $response['message'];

    }

    public function getRandom() {
        $response = Http::get($this->baseUrl.'breeds/image/random');
        return $response['message'];

    }

    public function getImage(string $breedId) {
        $response = Http::get($this->baseUrl.'breed/'.$breedId.'/images/random');
        return $response['message'];

    }
}
