<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();

        $posts = [
            [
                'user_id' => $faker->randomElement($userIds),
                'pict' => 'post1.jpeg',
                'caption' => 'Hello, this is my first post',
                'location' => 'Jakarta',
                'is_closed_friend' => false,
            ],
            [
                'user_id' => $faker->randomElement($userIds),
                'pict' => 'post2.jpg',
                'caption' => 'this is not my first post',
                'location' => 'Bekasi',
                'is_closed_friend' => false,
            ],
            [
                'user_id' => $faker->randomElement($userIds),
                'pict' => 'post3.jpg',
                'caption' => 'Minji cakep bet cuy',
                'location' => 'South Korea',
                'is_closed_friend' => false,
            ],
            [
                'user_id' => $faker->randomElement($userIds),
                'pict' => 'post1.jpeg',
                'caption' => 'Bukan punya gw',
                'location' => 'South Korea',
                'is_closed_friend' => true,
            ],
            [
                'user_id' => $faker->randomElement($userIds),
                'pict' => 'post1.jpeg',
                'caption' => 'Close friendnya sarah',
                'location' => 'Bekasi',
                'is_closed_friend' => true,
            ],
            [
                'user_id' => $faker->randomElement($userIds),
                'pict' => 'post2.jpg',
                'caption' => 'close friend postnya gid',
                'location' => 'Bandung',
                'is_closed_friend' => true,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
