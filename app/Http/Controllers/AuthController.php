<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $validated = $request->validated();
        if(!Auth::attempt($validated)){
            throw new AuthenticationException;
        }
        $user = Auth::user();
        $token = $user->createToken("api_token")->plainTextToken;
        return response()->json([
            "user_token" => $token
        ]);
    }

    public function logout(){
        Auth::user()->tokens()->delete();
        return response()->json(["message" => "logout"], 200);
    }
}
