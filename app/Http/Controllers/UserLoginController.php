<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller{
   
    public function UserLogin(Request $request){
        $fields = $request->validate([
           
            'mail' =>'required|string|unique:users,mail',
            'password' => 'required|string|confirmed',
        ]);

      //check email
      $user = User::where('mail', $fields['mail'])->first();

      
      //check password
     if(!user || check($fields['password'], $user->password)){
        return response([
        'message' => 'no user'], 401);

     }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
            return response( $response, 201);
    }
    
}
?>