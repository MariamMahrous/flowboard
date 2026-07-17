<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;


class AuthController extends Controller
{
    
public function register(RegisterRequest $request){
    $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password,
   
    ]);
    event(new Registered($user));
    return response()->json([
       'message' => 'User registered successfully. Please verify your email address.',
        'user'=>$user
    ],201);
    

}


 public function login(LoginRequest $request){
    
    if(!Auth::attempt($request->only('email','password'))){
        return response()->json(['message'=>'Invalid Credentials'],401);
    }
   
    $user=User::where('email',$request->email)->firstOrfail();
    $token=$user->createToken('auth_token')->plainTextToken;
      return response()->json([
        'message'=>'Login Successful',
        'user'=>$user,
        'token'=>$token
    ],200);

  }
   
  public function logout(Request $request){
    $request->user()->currentAccessToken()->delete();
     return response()->json([
        'message'=>'logout Successful',
        
    ],200);
  }




}
