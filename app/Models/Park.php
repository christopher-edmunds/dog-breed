<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Park extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Many to many polymorphic relationship with users
     **/

    public function users(): MorphToMany
    {
        return $this->morphedByMany(ParkUser::class, 'parkable');
    }

    /**
     * Many to many polymorphic relationship with breeds
     **/

    public function breeds(): MorphToMany
    {
        return $this->morphToMany(Breed::class, 'breedable');
    }
}
