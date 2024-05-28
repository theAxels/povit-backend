<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);


        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['success' => false, 'message' => 'Invalid email or password'], 401);
        }

        $user = Auth::user();


        return response()->json(['success' => true, 'message' => 'User logged in successfully', 'user' => $user], 200);
    }
}
