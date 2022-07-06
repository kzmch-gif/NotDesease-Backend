<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'mail' =>'required|string|unique:users,mail',
            'password' => 'required|string',
            'age' => 'required',
            'weight' => 'required',
            'height' => 'required',
            
        ]);
        $user = User::create([
            'name' => $fields['name'],
            'mail' =>  $fields['mail'],
            'password' =>  bcrypt($fields['password']),
            'age' =>  $fields['age'],
            'weight' =>  $fields['weight'],
            'height' =>  $fields['height'],
        ]);

       $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
            return response($response, 201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            'message' => 'logout done'
        ];
    }


    public function login(Request $request){

        $fields = $request->validate([
            'mail' =>'required|string',
            'password' => 'required|string',
        ]);

        //check email
        $user = User::where('mail', $fields['mail'])->first();

        //check passw
        if(!$user || !Hash::check($fields['password'], $user->password)){
                return response([
                    'message' => 'bad creds'
                ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
       
        $response = [
            'user' => $user,
            'token' => $token
            
        ];
            return response( $response, 201);
    }
}
