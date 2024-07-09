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
        'profile_pics',
        'profile_desc'
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
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }

    public function closefriends()
    {
        return $this->belongsToMany(User::class, 'close_friends', 'user_id', 'friend_id');
    }

    public function isCloseFriendOf()
    {
        return $this->belongsToMany(User::class, 'close_friends', 'friend_id', 'user_id');
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
        $friendIds = $this->friends()->pluck('users.id')->toArray();
        $youMightKnowIds = Friend::whereIn('user_id', $friendIds)
                                ->whereNotIn('friend_id', $friendIds)
                                ->where('friend_id', '<>', $this->id)
                                ->pluck('friend_id')
                                ->toArray();
        return User::whereIn('id', $youMightKnowIds)->get();
    }
}
