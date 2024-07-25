<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class ParkUser extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'location'];

    /**
     * Get all of the breeds.
     */
    

    public function breeds(): MorphToMany
    {
        return $this->morphToMany(Breed::class, 'breedable');
    }

    public function parks(): MorphToMany
    {
        return $this->morphToMany(Park::class, 'parkable');
    }
}