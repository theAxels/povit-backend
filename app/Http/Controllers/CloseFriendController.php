<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CloseFriendController extends Controller
{
    public function getCloseFriends()
    {
        $user = Auth::user();
        $closeFriends = $user->closefriends;


        $suggestedFriends = $user->friends()->whereNotIn('friend_id', $closeFriends->pluck('id'))->get();


        // $suggestedFriends = Friend::where('user_id', $user->id)->whereNotIn('friend_id', $closeFriends->pluck('id'))->get();
        // user that have friends which are not in closefriend and not the user itself
        // $suggestedFriends = User::whereHas('friends', function ($query) use ($user, $closeFriends) {
        //     $query->whereNotIn('friend_id', $closeFriends->pluck('id'))->where('friend_id', '!=', $user->id);
        // })->get();



        // dd($closeFriends);

        return response()->json([
            'closeFriends' => $closeFriends,
            'suggestedFriends' => $suggestedFriends,
        ]);
    }

    public function addCloseFriend(Request $request)
    {
        $user = Auth::user();
        $friendId = $request->input('id');

        try {
            // Check if the friend is already in the close friends list
            if ($user->closefriends()->where('friend_id', $friendId)->exists()) {
                return response()->json([
                    'message' => 'Friend is already in the close friends list',
                ], 400);
            }

            // Attach the friend to the user's close friends list
            $user->closefriends()->attach($friendId);
            // also insert the created at and updated at
            $user->closefriends()->updateExistingPivot($friendId, ['created_at' => now(), 'updated_at' => now()]);

            return response()->json([
                'message' => 'Friend added to close friends successfully',
                'closeFriends' => $user->closefriends,
            ]);
        } catch (\Exception $e) {
            // Log the error for further investigation
            // \Log::error('Error adding friend to close friends: ' . $e->getMessage());

            return response()->json([
                'message' => 'Error adding friend to close friends',
                'error' => $e->getMessage(),
            ], 500);
        }
    }



    public function deleteCloseFriend(Request $request){
        $user = Auth::user();
        $friendId = $request->input('id');
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
