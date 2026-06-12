<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStat extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'user_id';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'followers_count',
        'following_count',
        'articles_count',
        'total_views',
        'total_earnings',
    ];

    protected function casts(): array
    {
        return [
            'total_earnings' => 'decimal:2',
            'updated_at'     => 'datetime',
        ];
    }

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

    /**
     * Create default stats row when a new user registers.
     * Call this from User observer or RegisterController.
     */
    public static function initFor(User $user): self
    {
        return self::firstOrCreate(
            ['user_id' => $user->id],
            [
                'followers_count' => 0,
                'following_count' => 0,
                'articles_count'  => 0,
                'total_views'     => 0,
                'total_earnings'  => 0,
            ]
        );
    }
}
