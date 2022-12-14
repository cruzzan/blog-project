<?php

namespace App\Models\Policies;

use App\Models\Enums\CapabilityTag;
use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {

        return $user->hasCapability(CapabilityTag::AdminUsers);
    }

    public function update(User $user): bool
    {
        return $user->hasCapability(CapabilityTag::AdminUsers);
    }
}
