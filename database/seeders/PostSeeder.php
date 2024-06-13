<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'user_id' => 2,
            'pict' => 'user_post/post1.jpeg',
            'caption' => 'Hello, this is my first post',
            'location' => 'Jakarta',
            'is_closed_friend' => false,
        ]);
        Post::create([
            'user_id' => 2,
            'pict' => 'user_post/post2.jpg',
            'caption' => 'this is not my first post',
            'location' => 'Bekasi',
            'is_closed_friend' => false,
        ]);
        Post::create([
            'user_id' => 3,
            'pict' => 'user_post/post3.jeg',
            'caption' => 'Minji cakep bet cuy',
            'location' => 'South Korea',
            'is_closed_friend' => false,
        ]);




    }
}
