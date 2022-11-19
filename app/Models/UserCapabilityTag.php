<?php

namespace App\Models;

use App\Models\Enums\CapabilityTag;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCapabilityTag extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'capability',
    ];

    protected $casts = [
        'capability' => CapabilityTag::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
