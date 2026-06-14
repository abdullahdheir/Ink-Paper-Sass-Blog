<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'avatar_path',
        'bio',
        'website',
        'twitter',
    ];

    protected $appends = [
        'avatar_url',
    ];
    
    protected $hidden = [
        'avatar_path',
    ];

    // -------------------------------------------------------------------------
    // Relationships
    // -------------------------------------------------------------------------

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    public function getAvatarUrlAttribute(): string
    {
        return $this->avatar_path ? Storage::url($this->avatar_path) : 'https://ui-avatars.com/api/?name=' . urlencode($this->user->name ?? 'U') . '&background=6750A4&color=fff&size=128';
    }
}
