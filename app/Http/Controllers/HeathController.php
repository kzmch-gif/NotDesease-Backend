<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Health;


class HeathController extends Controller
{
    
    //
   public function list($id=null){
    return $id?Health::find($id):Health::all();
} 



public function index()
{
    // get all heart data  
    return Health::all();
}


public function add(Request $request)
{
    // create new data row 

    
    // create new data row 
    $health = new Health;
    $health->name = $request->name;
    $health->data = $request->data;
    $health->user_id = $request->user_id;
    $result = $health->save();

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
    
    
    return Health::find($request->id);
}


public function update(Request $request)
{
    // update a data
    $health = Health::find($request->id);
    $health->name = $request->name;
    $health->data = $request->data;
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
        $data = Health::find($request->id);
        $data->delete();
        if($data){
            return ["result" => "data deleted"];
       } else {
       /*$health->update($request->all());*/
            return ["result" => "data not deleted"];
           }
    }

} 
