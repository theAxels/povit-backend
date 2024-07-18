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
}
