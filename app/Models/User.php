<?php

namespace App\Models;

use App\Models\Enums\CapabilityTag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'vanity_tag',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function capabilityTags()
    {
        return $this->hasMany(UserCapabilityTag::class);
    }

    /**
     * @param string $vanity_tag
     * @throws ModelNotFoundException
     * @return User
     */
    public static function findOrFailByVanityTag(string $vanity_tag): User
    {
        return self::where('vanity_tag', $vanity_tag)->firstOrFail();
    }

    public function fullName(): string
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }

    public function hasCapability(CapabilityTag $tag): bool
    {
        return $this->capabilityTags->pluck('capability')->contains($tag);
    }
}
