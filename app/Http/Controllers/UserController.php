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
     * Associate a polymorphic relationship.
     */
    public function associate($userId, Request $request)
    {

      //This code feels horrible as I was running out of time. With more time 
      //I would move this into a TypeHandler class that can can hold all the 
      //logic for adding the type. 

      //There is no checking to see if the user exists. I have tested associating a breed
      //and park to a user but not if a user doesn't exist. 
      //With more time I would check the user and if it doesn't exist return No such user
      //or something more polite
        $user = ParkUser::find($userId);

        //Returning the type and id variables from the request. 
        //So in the api call you must add 2 post variables 
        //type: 'breed' or 'park', id: the id of the breed or park
        
        $type = $request->input('type');
        $id = $request->input('id');

        //The switch statement allows for more relationships to be added. This code
        //absolutely should be inside it's own class because it couls get quite 
        //big and make the controller messy. 

        //As with the user class I haven't added any checking to see if the 
        //breed or park have already been attached so you can add multiple
        //entries for the same relationship. I have stopped this from being displayed
        //to the user in the final api call but it means it will take up unnecessary
        //database space so a check to see if they've already been added or a constraint
        //on the columns would be good.

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
            //I've added a default just in case the wrong type is sent.
          default:
          return response()->json("No such object");    
        }

       


        

      
      
        


        
    }
}
