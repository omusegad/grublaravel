<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{

    public function signup(Request $request){
        
        return $request->all();

        $validated = $request->validated();
        $validatedData['password'] = Hash::make($validated['password']);
        $user = User::create($validatedData);
        $useraccessToken = $user->createToken('authToken')->accessToken;
        return response(['user' => $user, 'useraccess_token' => $accessToken]);
    }

    public function signin(Request $request){
        $loginData =  $request->validate([
            'email'    =>  'email|required',
            'password' =>  'required'
        ]);
        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credetials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }




}
