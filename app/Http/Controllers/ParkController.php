<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Park;
use App\Models\Breed;

class ParkController extends Controller
{
     /**
     * Attach a breed.
     */
    public function breed($parkId, Request $request)
    {
        //As with the UserController there is no checking to see if the park exists. 
        //With more time I would check the park and if it doesn't exist return No such park
        //or something more polite
        $park = Park::find($parkId);

        //I copied the code from the usercontroller which had the type for park or breed. 
        //I decided to leave it in here because park of your requirement was to have 
        //some parks only allow some breeds. So potentially I could create another relationship
        //for banned breeds or allowed breeds and then use this same function. 
        //For the api call you need 2 post variables.
        //type: 'breed', id: id of the breed
        //If I added the banned or allowed breed relationship I could add another type
        //And part of addding the breed would check to see if the park allows the breed

        $type = $request->input('type');
        $id = $request->input('id');
        
        //This switch statement should be moved out of the controller into a TypeHandler class
        switch($type) {
            case 'breed':
              $object = Breed::find($id);
              $park->breeds()->attach($object);
              return response()->json(["Breed ".$object->name." attached"]);
              break;
            default:
            return response()->json("No such object"); 
        }
    }


}
