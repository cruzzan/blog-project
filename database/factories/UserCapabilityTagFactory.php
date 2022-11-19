<?php

namespace Database\Factories;

use App\Models\Enums\CapabilityTag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserCapabilityTagFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'capability' => CapabilityTag::LogIn,
        ];
    }
}
