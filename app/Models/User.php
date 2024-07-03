<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Friend;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_pics'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function friends()
    {
        return $this->hasManyThrough(User::class, Friend::class, 'user_id', 'id', 'id', 'friend_id');
    }

    // Define a relationship with the PostTag model
    public function postTags()
    {
        return $this->hasMany(PostTag::class, 'friend_id');
    }

    // Define a relationship with the Post model
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function youMightKnow()
    {
        $friendIds = $this->friends()->pluck('friend_id')->toArray();
        $youMightKnowIds = User::whereHas('friends', function ($query) use ($friendIds) {
            $query->whereIn('user_id', $friendIds);
        })
        ->whereNotIn('id', $friendIds)
        ->where('id', '<>', $this->id)
        ->pluck('id')
        ->toArray();

        return User::whereIn('id', $youMightKnowIds)->get();
    }
    
    // create a function to get the user's friends
    public function getFriends()
    {
        return $this->friends->pluck('friend_id');
    }

    // create a function to get the user's posts
    public function getPosts()
    {
        return $this->posts->pluck('id');
    }
}
