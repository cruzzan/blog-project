<?php

namespace App\Models\Policies;

use App\Models\Enums\CapabilityTag;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function view(): bool
    {
        return true;
    }

    public function create(User $user, Post $post = null): bool
    {
        if ($user->capabilityTags()->get()->pluck('capability')->contains(CapabilityTag::Author)) {
            if (isset($post)) {
                return $user->id === $post->user_id;
            }
            return true;
        }
        return false;
    }
}
