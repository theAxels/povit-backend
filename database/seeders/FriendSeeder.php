<?php

namespace Database\Seeders;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FriendSeeder extends Seeder
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

        $userIds = array_filter($userIds, function ($id) use ($userIdToExclude) {
            return $id !== $userIdToExclude;
        });

        $combinations = [];

        for ($i = 0; $i < 10; $i++) {
            do {
                $userId = $faker->randomElement($userIds);
                $friendId = $faker->randomElement($userIds);
                $combination1 = $userId . '-' . $friendId;
                $combination2 = $friendId . '-' . $userId;
            } while ($userId === $friendId || in_array($combination1, $combinations) || in_array($combination2, $combinations));

            $combinations[] = $combination1;
            $combinations[] = $combination2;

            Friend::create([
                'user_id' => $userId,
                'friend_id' => $friendId,
            ]);

            // Insert the reverse direction
            Friend::create([
                'user_id' => $friendId,
                'friend_id' => $userId,
            ]);
        }
    }
}
