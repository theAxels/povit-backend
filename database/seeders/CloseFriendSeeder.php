<?php

namespace Database\Seeders;

use App\Models\CloseFriend;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CloseFriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userToExclude = User::where('name', 'Angki')->first();
        $userIdToExclude = $userToExclude ? $userToExclude->id : null;
        $userIds = User::pluck('id')->toArray();

        $combinations = [];
        
        $userIds = array_filter($userIds, function ($id) use ($userIdToExclude) {
            return $id !== $userIdToExclude;
        });
        
        for ($i = 0; $i < 5; $i++) {
            do {
                $userId = $faker->randomElement($userIds);
                $friendId = $faker->randomElement($userIds);
                $combination = $userId . '-' . $friendId;
            } while ($userId === $friendId || in_array($combination, $combinations));
        
            $combinations[] = $combination;
        
            CloseFriend::create([
                'user_id' => $userId,
                'friend_id' => $friendId,
            ]);
        }
    }
}
