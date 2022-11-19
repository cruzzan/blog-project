<?php

namespace Database\Seeders;

use App\Models\Enums\CapabilityTag;
use App\Models\Post;
use App\Models\User;
use App\Models\UserCapabilityTag;
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
         $user = User::factory(1)
             ->has(Post::factory()->count(5))
             ->create([
             'email' => 'user@example.com',
             'password' => Hash::make('password'),
         ])->first();

         foreach (CapabilityTag::cases() as $capability) {
             UserCapabilityTag::factory(1)->create([
                 'user_id' => $user,
                 'capability' => $capability->value,
             ]);
         }
    }
}
