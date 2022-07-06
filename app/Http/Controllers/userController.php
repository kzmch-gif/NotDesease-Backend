<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class userController extends Controller
{
//     //
//    public function one($id=null){
//     return $id?User::find($id):User::all();
// } 


//Get all data
public function index()
{
    return User::all();
}


public function register(Request $request)
{
    // create new data row 

    // create new data row 
    $user = new User;
    $user->name = $request->name;
    $user->age = $request->age;
    $user->weight = $request->weight;
    $user->height = $request->height;
    $user->mail = $request->mail;
    $user->password = $request->password;
    $result = $user->save();

    if($result)
    {
         return ["result" => "data was saved"];
    } else {
    /*$health->update($request->all());*/
         return ["result" => "data not saved"];
        }
    // return Health::create($request->all());
}



public function update(Request $request, $id)
{
    if($id){
        $name = $request->name;
        $height = $request->height;
        $weight = $request->weight;
        $age = $request->age;

        $user = User::findOrFail($id);
        $user->name = $name;
        $user->weight = $weight;
        $user->age = $age;
        $user->height = $height;
        
        $user->save();

        $results = [
            'data' => $user,
            'code' => 200,
            'message' => 'user was updated'
        ];

        return $results;
    }
    
    // // update a data
    // $user = User::find($request->id);
    // $user->name = $request->name;
    // $user->age = $request->age;
    // $user->weight = $request->weight;
    // $user->height = $request->height;
    // $user->mail = $request->mail;
    // $user->password = $request->password;
    // $result = $user->save();

    // if($result)
    // {
    //      return ["result" => "data was updated"];
    // } else {
    // /*$health->update($request->all());*/
    //      return ["result" => "data not updated"];
    //     }
    }


    public function delete(Request $request)
    {
        // delete a data
        $data = User::find($request->id);
        $data->delete();
        if($data){
            return ["result" => "data deleted"];
       } else {
       /*$health->update($request->all());*/
            return ["result" => "data not deleted"];
           }
    }

    public function one(Request $request, $id){
        $user = \App\Models\User::find($id);
        if(!$user) return response(content: '', status: 404);
    
        return $user;
    }

}
