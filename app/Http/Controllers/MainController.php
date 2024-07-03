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
        // $friendsPosts = Post::whereIn('friend_id', $user->friends->pluck('id'))->get();
        // dd($friendsPosts);
        // return view('main.main', ['images' => $friendsPosts]);

        // Get Friend List DONE
        $user = Auth::user();
        $friends = $user->friends;

        $friendsPosts = Post::whereIn('user_id', $user->friends->pluck('id'))->get();
        // dd($friendsPosts);

        // You Might Know DONE
        // $user->
        // $youMightKnow = $user->youMightKnow();

        // return view('main.main', [
        //     'friends' => $friends,
        //     'youMightKnow' => $youMightKnow,
        //     'images' => $friendsPosts
        // ]);


        // dd($friendsPosts);
        return view('main.main', ['images' => $friendsPosts]);

        // Get Friend List Done
        // $user = Auth::user();
        // $friends = $user->friends;
        // return view('main.main', ['friends' => $friends]);



        // tiap user yang ada user id bisa ngepost image,
        // kalau mau ngambil data temen temen nya, berarti harus ambil user id punya semua temen nya
        // abis itu ambil image nya temen temennya

        // Take the friend which user id is the user's id
    }

    public function store(Request $request){
        $user = Auth::user();
        $request->validate([
            'pict' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'caption' => 'required',
            'location' => 'required',
            'is_closed_friend' => 'required'
        ]);

        // $imageName = time().'.'.$request->pict->extension();
        // $request->pict->move(public_path('images'), $imageName);

        $photo_file = $request->file('pict');
        $extension = $photo_file->extension();
        $imageName = date('dmyHis') . uniqid() . '.' . $extension;
        $photo_file->move(public_path('user_post'), $imageName);

        Post::create([
            'user_id' => $user->id,
            'pict' => $imageName,
            'caption' => $request->caption,
            'location' => $request->location,
            'is_closed_friend' => $request->is_closed_friend,
        ]);

        return redirect()->route('main');
    }


}
