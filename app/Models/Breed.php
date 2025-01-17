<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Breed extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'sub_breed'];

    /**
     * Many to many polymorphic relationship with users
     **/

    public function users(): MorphToMany
    {
        return $this->morphedByMany(ParkUser::class, 'breedable');
    }

    /**
     * Many to many polymorphic relationship with parks
     **/

    public function parks(): MorphToMany
    {
        return $this->morphedByMany(Park::class, 'breedable');
    }


}
