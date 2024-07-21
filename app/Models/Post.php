<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pict',
        'caption',
        'location',
        'is_closed_friend',
    ];

    public $incrementing = false; // Disable auto-incrementing

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    // Define a relationship with the User model
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define a relationship with the PostTag model
    public function postTags()
    {
        return $this->hasMany(PostTag::class, 'post_id');
    }
}
