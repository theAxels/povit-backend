<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
    ];

    // Define a relationship with the Post model
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Define a relationship with the User model (owner of the post tag)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
