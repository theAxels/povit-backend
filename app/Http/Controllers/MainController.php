<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MainController extends Controller
{
    public function formatCreatedAt($createdAt){
        $createdAt = Carbon::parse($createdAt);
        $now = Carbon::now();

        $diffInSeconds = round($createdAt->diffInSeconds($now));
        $diffInMinutes = round($createdAt->diffInMinutes($now));
        $diffInHours = round($createdAt->diffInHours($now));
        $diffInDays = round($createdAt->diffInDays($now));
        $diffInWeeks = round($createdAt->diffInWeeks($now));

        if ($diffInSeconds < 60) {
            return $diffInSeconds . ' seconds ago';
        } elseif ($diffInMinutes < 60) {
            return $diffInMinutes . ' minutes ago';
        } elseif ($diffInHours < 24) {
            return $diffInHours . ' hours ago';
        } elseif ($diffInDays < 7) {
            return $diffInDays . ' days ago';
        } else {
            return $diffInWeeks . ' weeks ago';
        }
    }

    public function index()
    {
        $user = Auth::user();
        $friends = $user->friends;

        $youMightKnow = $user->youMightKnow();
        $userPosts = $user->posts;
        $friendsIds = $user->friends->pluck('id')->toArray();
        $openFriendsPosts = Post::whereIn('user_id', $friendsIds)
                                ->where('is_closed_friend', false)
                                ->get();
        $isCloseFriendOfIds = $user->isCloseFriendOf->pluck('id')->toArray();
        $closedFriendsPosts = Post::whereIn('user_id', $isCloseFriendOfIds)
                                ->where('is_closed_friend', true)
                                ->get();
        $friendsPosts = $openFriendsPosts->merge($closedFriendsPosts);
        $homePosts = $userPosts->merge($friendsPosts)->sortByDesc('created_at');

        $closeFriends = $user->closefriends;
        $suggestedFriends = User::whereNotIn('id', $closeFriends->pluck('id'))->take(5)->get();

        $homePosts->transform(function ($post) {
            $post->time = $this->formatCreatedAt($post->created_at);
            return $post;
        });
        return view('dashboard', [
            'posts' => $homePosts,
            'friends' => $friends,
            'youMightKnow' => $youMightKnow,
            'user'=> $user,
            'closeFriends' => $closeFriends,
            'suggestedFriends' => $suggestedFriends,
        ]);
    }

    public function store(Request $request){
        try {
            $user = Auth::user();

            $request->validate([
                'pict' => 'required|image|max:2048',
                'tags' => 'array',
                'is_closed_friend' => 'required',
            ]);

            if (!$request->hasFile('pict')) {
                throw new \Exception('No file uploaded');
            }

            $photo_file = $request->file('pict');
            $imageName = date('YmdHis') . '_' . uniqid() . '.' . $photo_file->getClientOriginalExtension();
            $photo_file->move(public_path('user_post'), $imageName);

            DB::beginTransaction();
            $post = Post::create([
                'user_id' => $user->id,
                'pict' => $imageName,
                'caption' => $request->caption ?? null,
                'location' => $request->location ?? null,
                'is_closed_friend' => $request->is_closed_friend,
            ]);

            if ($request->filled('tags')) {
                foreach ($request->tags as $userId) {
                    PostTag::create([
                        'post_id' => $post->id,
                        'user_id' => $userId,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('home')->with('success', 'Successfully added new post');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to create post: ' . $e->getMessage());
        }
    }

    public function searchUsers(Request $request){
        $query = $request->get('query');
        $users = User::where('name', 'like', '%' . $query . '%')->get();

        return response()->json($users);
    }


    public function follow($friendId){
        try {
            $user = auth()->user();
            $friend = User::find($friendId);
            if (!$friend) {
                throw new \Exception('User not found.');
            }
            $user->friends()->attach($friendId);
            return redirect()->route('home')->with('success', 'Successfully followed ' . $friend->name . '.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to follow user: ' . $e->getMessage());
        }
    }

    public function unfollow($friendId){
        try {
            $user = auth()->user();
            $friend = User::find($friendId);
            if (!$friend) {
                throw new \Exception('User not found.');
            }
            $user->friends()->detach($friendId);
            return redirect()->route('home')->with('success', 'Successfully unfollowed ' . $friend->name . '.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to unfollow user: ' . $e->getMessage());
        }
    }
}
