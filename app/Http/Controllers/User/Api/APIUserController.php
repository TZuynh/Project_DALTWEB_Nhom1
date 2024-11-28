<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class APIUserController extends Controller
{
    public function getUser()
    {
       $User = Auth::user();
   
        // Kiểm tra xem $Admin có null hay không
        $User = User::all();
   
       return response()->json(['users' => $User]);
    }
   public function Login(Request  $request){


       $validated = $request->validate([
           'username' => 'required|string',
           'password' => 'required|string',
       ]);
       $user = User::where('username', $validated['username'])->first();
       if(!$user ){
           return response()->json([
               'message'=>'no user with email'
           ], 401);
       }
       if( Hash::check($validated['password'], $user->password))
       {
           return response()->json([ 
               'success'=>true, 
               'data'=>$user
           ]);         
       }
       return response()->json([
           'message'=>'Invalid credentials'
       ], 401);
       }
       public function register(Request $request)
   {
       $request = request(['username','password']);
       $user = new User();
       $user->username = $request['username'];
       
      
   
       $user->password = $request['password'];
 
       $user->save();
       return response()->json(['message'=>'Register successful']);
   }
}
