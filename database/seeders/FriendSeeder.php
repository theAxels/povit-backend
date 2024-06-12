<?php

namespace Database\Seeders;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Friend::create([
            'user_id' => 2,
            'friend_id' => 3,
        ]);
        Friend::create([
            'user_id' => 2,
            'friend_id' => 4,
        ]);
        Friend::create([
            'user_id' => 2,
            'friend_id' => 5,
        ]);
        Friend::create([
            'user_id' => 3,
            'friend_id' => 4,
        ]);
        Friend::create([
            'user_id' => 3,
            'friend_id' => 2,
        ]);
    }
}
