<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();
        $postIds = Post::pluck('id')->toArray();

        PostTag::create([
            'post_id' => $faker->randomElement($postIds),
            'user_id' => $faker->randomElement($userIds),
        ]);
        PostTag::create([
            'post_id' => $faker->randomElement($postIds),
            'user_id' => $faker->randomElement($userIds),
        ]);
    }
}
