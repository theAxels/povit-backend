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
            'pict' => 'post1.jpeg',
            'caption' => 'Hello, this is my first post',
            'location' => 'Jakarta',
            'is_closed_friend' => false,
        ]);
        Post::create([
            'user_id' => 2,
            'pict' => 'post2.jpg',
            'caption' => 'this is not my first post',
            'location' => 'Bekasi',
            'is_closed_friend' => false,
        ]);
        Post::create([
            'user_id' => 3,
            'pict' => 'post3.jpg',
            'caption' => 'Minji cakep bet cuy',
            'location' => 'South Korea',
            'is_closed_friend' => false,
        ]);
        Post::create([
            'user_id' => 3,
            'pict' => 'post1.jpeg',
            'caption' => 'Bukan punya gw',
            'location' => 'South Korea',
            'is_closed_friend' => true,
        ]);
        Post::create([
            'user_id' => 4,
            'pict' => 'post1.jpeg',
            'caption' => 'Close friendnya sarah',
            'location' => 'Bekasih',
            'is_closed_friend' => true,
        ]);
        Post::create([
            'user_id' => 5,
            'pict' => 'post2.jpg',
            'caption' => 'close friend postnya gid',
            'location' => 'Bandungs',
            'is_closed_friend' => true,
        ]);
    }
}
