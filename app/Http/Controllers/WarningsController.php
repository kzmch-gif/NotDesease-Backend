<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warnings;

class WarningsController extends Controller
{
    
   public function list($id=null){
    return $id?Warnings::find($id):Warnings::all();
} 



public function index()
{
    // get all heart data  
    return Warnings::all();
}


public function add(Request $request)
{
  
    // create new data row 
    $warnings = new Warnings;
    $warnings->user_id = $request->user_id;
    $warnings->name = $request->name;
    $result = $warnings->save();

    if($result)
    {
         return ["result" => "data was saved"];
    } else {
    /*$health->update($request->all());*/
         return ["result" => "data not saved"];
        }
    // return Health::create($request->all());
}


public function show(Request $request)
{
    
    
    return Warnings::find($request->id);
}


public function update(Request $request)
{
    // update a data
    $warnings = Warnings::find($request->id);
    $warnings->name = $request->name;
    $warnings->user_id = $request->user_id;
    $result = $warnings->save();

    if($result)
    {
         return ["result" => "data was updated"];
    } else {
    /*$health->update($request->all());*/
         return ["result" => "data not updated"];
        }
    }


    public function delete(Request $request)
    {
        // delete a data
        $data = Warnings::find($request->id);
        $data->delete();
        if($data){
            return ["result" => "data deleted"];
       } else {
       /*$health->update($request->all());*/
            return ["result" => "data not deleted"];
           }
    }

}
