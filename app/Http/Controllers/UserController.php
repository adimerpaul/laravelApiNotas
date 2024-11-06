<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{
    function login(Request $request){
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->with('permissions')->first();
        if($user && !auth()->attempt($credentials)){
            return response()->json(['message' => 'Usuario o contraseña incorrectos'], 401);
        }
        $token = $user->createToken('token')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
}
