<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $friendsPosts = Post::whereIn('friend_id', $user->friends->pluck('id'))->get();
        return view('main.main', ['images' => $friendsPosts]);

        // Get Friend List Done
        $user = Auth::user();
        $friends = $user->friends;
        return view('main.main', ['friends' => $friends]);




        // 'user_id',
        // 'pict',
        // 'caption',
        // 'location',
        // 'is_closed_friend',

        // tiap user yang ada user id bisa ngepost image,
        // kalau mau ngambil data temen temen nya, berarti harus ambil user id punya semua temen nya
        // abis itu ambil image nya

        // Take the friend which user id is the user's id
    }


}
