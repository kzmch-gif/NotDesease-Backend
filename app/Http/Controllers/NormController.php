<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Norm;


class NormController extends Controller
{
    //
    
    //
   public function list($id=null){
    return $id?Norm::find($id):Norm::all();
} 



public function index()
{
    // get all heart data  
    return Norm::all();
}


public function add(Request $request)
{
    // create new data row 
    $norm = new Norm;
    $norm->name = $request->name;
    $norm->norm = $request->norm;
    $norm->health_id = $request->health_id;
    $result = $norm->save();

    if($result)
    {
         return ["result" => "data was saved"];
    } else {
    /*$health->update($request->all());*/
         return ["result" => "data not saved"];
        }
    }
    // return Norm::create($request->all());



public function show($id)
{
    // show a heart
    return Norm::find($id);
}


public function update(Request $request)
{
    // update a data
    $health = Norm::find($request->id);
    $health->norm = $request->norm;
    $result = $health->save();

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
        $data = Norm::find($request->id);
        $data->delete();
        if($data){
            return ["result" => "data deleted"];
       } else {
       /*$health->update($request->all());*/
            return ["result" => "data not deleted"];
           }
    }
}
