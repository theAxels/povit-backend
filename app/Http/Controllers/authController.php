<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(Auth $auth)
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',

        ]);
        // dd($request);
        // Create a new user
        $user = User::create([
            'name' => "{$request->firstname} {$request->lastname}",
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login_page')->with('success', 'You have been registered successfully');
    }

    public function check(Request $request)
    {
        if (Auth::check()) {
            return response()->json(['status' => 'authenticated', 'user' => Auth::user()]);
        }
        return response()->json(['status' => 'not authenticated']);
    }

    public function loginview()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // dd("Berhasil Login");
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'Failed to login. Please check your credentials and try again.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login_page')->with('success', 'You have been logged out');
    }

    public function updateProfile(Request $request){
    $request->validate([
        'profile_pics' => 'required|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    if ($request->hasFile('profile_pics')) {
        $user = Auth::user();

        // Check if user already has a profile image
        if ($user->profile_pics && $user->profile_pics != 'default.png') {
            $existingImagePath = public_path('user_profile/' . $user->profile_pics);
            if (File::exists($existingImagePath)) {
                File::delete($existingImagePath);
            }
        }

        $photo_file = $request->file('profile_pics');
        $extension = $photo_file->extension();
        $imageName = date('dmyHis') . uniqid() . '.' . $extension;
        $photo_file->move(public_path('profile_pics'), $imageName);

        // Update the user's profile image path in the database
        $user->profile_pics = $imageName;
        $user->save();

        return redirect()->back()->with('success', 'Profile picture updated successfully');
    }

    return redirect()->back()->with('error', 'No image file selected');
}


    public function updateUsername(Request $request){
        // dd($request->all());

        $request->validate([
            'username' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->input('username');
        $user->save();

        // return redirect()->back()->with('success', 'Username updated successfully');
        return redirect()->back();
    }

    public function updateProfileDesc(Request $request){
        $request->validate([
            'profile_desc' => 'sometimes|nullable|string|max:50',
        ]);

        $user = Auth::user();
        $user->profile_desc = $request->input('profile_desc');
        $user->save();

        return redirect()->back();
    }

}
