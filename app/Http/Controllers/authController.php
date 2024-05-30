<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use Kreait\Firebase\Exception\InvalidArgumentException;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(FirebaseAuth $auth)
    {
        $this->auth = $auth;
    }

    public function registerview(){
        return view('register');
    }

    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user
        $user = User::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Return success response
        return response()->json(['success' => true, 'message' => 'User registered successfully']);
    }
    public function checkLogin(Request $request)
    {
        $idToken = $request->input('idToken');

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idToken);
            $uid = $verifiedIdToken->claims()->get('sub');
            $user = $this->auth->getUser($uid);

            return response()->json([
                'status' => 'success',
                'user' => $user,
            ], 200);
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'The token could not be parsed: ' . $e->getMessage(),
            ], 400);
        }
    }
}
