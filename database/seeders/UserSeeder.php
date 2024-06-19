<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'profile_pics' => 'default.png',
        ]);
        User::create([
            'name' => 'Andrea',
            'email' => 'andre@gmail.com',
            'password' => bcrypt('andre123'),
            'profile_pics' => 'default.png',
        ]);
        User::create([
            'name' => 'Richard',
            'email' => 'richard@gmail.com',
            'password' => bcrypt('richard123'),
            'profile_pics' => 'default.png',
        ]);
        User::create([
            'name' => 'Sarah',
            'email' => 'sarah@gmail.com',
            'password' => bcrypt('sarah123'),
            'profile_pics' => 'default.png',
        ]);
        User::create([
            'name' => 'Gideon',
            'email' => 'gideon@gmail.com',
            'password' => bcrypt('gideon123'),
            'profile_pics' => 'default.png',
        ]);
        User::create([
            'name' => 'Angki',
            'email' => 'angki@gmail.com',
            'password' => bcrypt('angki123'),
            'profile_pics' => 'default.png',
        ]);
    }
}