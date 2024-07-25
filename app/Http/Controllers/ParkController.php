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
        $park = Park::find($parkId);

        $type = $request->input('type');
        $id = $request->input('id');
        
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
