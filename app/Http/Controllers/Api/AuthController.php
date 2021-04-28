<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserAuthRequest;

class AuthController extends Controller
{
    //customer register api
    public function register(UserAuthRequest $request) {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        if($validated) {
            $user = User::create($validated)->createToken('authToken')->accessToken;
           // $accessToken = $user->createToken('authToken')->accessToken;
            return response()->json([
                'status_code' => '201',
                'message' => 'Successfully created user!'
            ]);
       }else{
            return response()->json([
                'status_code' => '401',
                'error' => $validated->errors()
            ]);
       }
    }



    

     //user login
     public function login(Request $request){
         $loginData =  $request->validate([
              'email'    =>  'email|required',
              'password' =>  'required'
          ]);
          if(!auth()->attempt($loginData)){
             return response([
                 'status_code' => '401',
                 'message' => 'Invalid Credetials'
             ]);
          }
          $accessToken = auth()->user()->createToken('authToken')->accessToken;
          return response(['user' =>auth()->user(), 'access_token' => $accessToken ]);
    }

}

