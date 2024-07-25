<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkUser;
use App\Models\Breed;
use App\Models\Breedable;
use App\Models\Park;

class UserController extends Controller
{
     /**
     * Attach a breed.
     */
    public function associate($userId, Request $request)
    {
        $user = ParkUser::find($userId);
        
        $type = $request->input('type');
        $id = $request->input('id');

        switch($type) {
          case 'breed':
            $object = Breed::find($id);
            $user->breeds()->attach($object);
            return response()->json(["Breed ".$object->name." attached"]);
            break;
          case 'park':
            $object = Park::find($id);
            $user->parks()->attach($object);
            return response()->json(["Park ".$object->name." attached"]);  
            break;
          default:
          return response()->json("No such object");    
        }

       


        

      
      
        


        
    }
}
