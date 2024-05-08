<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'friend_id',
    ];

    // Define a relationship with the User model (owner of the friend relationship)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define a relationship with the User model (friend of the user)
    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
