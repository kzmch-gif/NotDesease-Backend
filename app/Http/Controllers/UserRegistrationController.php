<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserRegistrationController extends Controller
{
    //
    function addUser(Request $req) {
        $user = new User;
     /*   $fields = $request->validate([
            'name' => 'required|string',
            'mail' =>'required|string|unique:users,mail',
            'password' => 'required|string|confirmed',
            'age' => 'required'
        ]);
        $user = User::create([
            'name' => $fields['name'],
            'mail' =>  $fields['mail'],
            'password' =>  $fields['password'],
            'age' =>  $fields['age'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
            return response( $response, 201);
*/
       
        $user->name = $req-> name;
        $user->age = $req-> age;
        $user->mail = $req-> mail;
        $user->password = $req-> password;
        $result = $user->save();
    
        if ($result){
            return ["Result" => "Data saved"];
        }
        else{
            return["Result" => "Fail"];
        }
        
    }
}
