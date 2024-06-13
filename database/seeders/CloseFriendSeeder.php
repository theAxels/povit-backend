<?php

namespace Database\Seeders;

use App\Models\CloseFriend;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CloseFriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CloseFriend::create([
            'user_id' => 2,
            'friend_id' => 3,
        ]);
        CloseFriend::create([
            'user_id' => 3,
            'friend_id' => 4,
        ]);
        CloseFriend::create([
            'user_id' => 3,
            'friend_id' => 2,
        ]);
    }
}
