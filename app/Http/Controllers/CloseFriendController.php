<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CloseFriendController extends Controller
{
    public function getCloseFriends()
    {
        $user = Auth::user();
        $closeFriends = $user->closefriends;
        $suggestedFriends = User::whereNotIn('id', $closeFriends->pluck('id'))->get();
        return response()->json([
            'closeFriends' => $closeFriends,
            'suggestedFriends' => $suggestedFriends,
        ]);
    }

    public function addCloseFriend(Request $request){
        $user = Auth::user();
        $friendId = $request->input('friend_id');
        $user->closefriends()->attach($friendId);
        return response()->json([
            'message' => 'Friend added to close friends successfully',
            'closeFriends' => $user->closefriends,
        ]);
    }

    public function deleteCloseFriend(Request $request){
        $user = Auth::user();
        $friendId = $request->input('friend_id');
        $user->closefriends()->detach($friendId);
        return response()->json([
            'message' => 'Friend removed from close friends successfully',
            'closeFriends' => $user->closefriends,
        ]);
    }

    public function clearCloseFriends(){
        $user = Auth::user();
        $user->closefriends()->detach();
        return response()->json([
            'message' => 'All close friends cleared successfully',
            'closeFriends' => $user->closefriends,
        ]);
    }

}
