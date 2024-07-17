<?php

namespace Database\Seeders;

use App\Models\PostTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostTag::create([
            'post_id' => 3,
            'user_id' => 2,
        ]);
        PostTag::create([
            'post_id' => 2,
            'user_id' => 3,
        ]);
    }
}
