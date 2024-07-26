<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/* 
I created the ParkUser model because laravel had already created me
user database table designed for auth. Probably not the best solution
but it was less time consuming to create a new user model called ParkUser
with the specified columns than alter the existing. Even if the ParkUser
name convention could be confusing.
*/

class ParkUser extends Model
{
    use HasFactory;

    //I've made these fillable so that I can run the seeders
    protected $fillable = ['name', 'email', 'location'];

    /**
     * Many to many polymorphic relationship with breeds
     **/
    
    
    public function breeds(): MorphToMany
    {
        return $this->morphToMany(Breed::class, 'breedable');
    }

     /**
     * Many to many polymorphic relationship with parks
     **/

    public function parks(): MorphToMany
    {
        return $this->morphToMany(Park::class, 'parkable');
    }
}