<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloseFriend extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'friend_id',
    ];

    // Define relationship with User model (owner of the close friends list)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define relationship with User model (close friend)
    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
