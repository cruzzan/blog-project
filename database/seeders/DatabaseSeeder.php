<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(1)
             ->has(Post::factory()->count(5))
             ->create([
             'email' => 'user@example.com',
             'password' => Hash::make('password'),
         ]);
    }
}
