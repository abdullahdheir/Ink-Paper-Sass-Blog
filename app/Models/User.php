<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\SubscriptionPlan;
use App\Observers\UserObserver;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Override;

#[Fillable(['name', 'email', 'password', 'username', 'subscription_plan', 'is_verified', 'is_active', 'email_verified_at'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    protected $appends = [
        'avatar',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'subscription_plan' => SubscriptionPlan::class,
            'is_verified' => 'boolean',
            'is_active' => 'boolean',
            'password' => 'hashed',
        ];
    }


    // -------------------------------------------------------------------------
    // Relationships
    // -------------------------------------------------------------------------

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function stats()
    {
        return $this->hasOne(UserStat::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function publishedArticles()
    {
        return $this->hasMany(Article::class)->where('status', 'published');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function activeSubscription()
    {
        return $this->hasOne(Subscription::class)
            ->where('status', 'active')
            ->latest();
    }

    public function earnings()
    {
        return $this->hasMany(Earning::class);
    }

    public function collaborations()
    {
        return $this->hasMany(Collaboration::class);
    }

    // -------------------------------------------------------------------------
    // Follow System
    // -------------------------------------------------------------------------

    /** Users that THIS user follows */
    public function following()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'follower_id',
            'following_id'
        )->withTimestamps();
    }

    /** Users that follow THIS user */
    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'following_id',
            'follower_id'
        )->withTimestamps();
    }

    public function isFollowing(User $user): bool
    {
        return $this->following()->where('following_id', $user->id)->exists();
    }

    public function follow(User $user): void
    {
        if ($this->id === $user->id) return;

        $this->following()->syncWithoutDetaching([$user->id]);

        $this->stats()->increment('following_count');
        $user->stats()->increment('followers_count');
    }

    public function unfollow(User $user): void
    {
        $this->following()->detach($user->id);

        $this->stats()->decrement('following_count');
        $user->stats()->decrement('followers_count');
    }

    // -------------------------------------------------------------------------
    // Likes & Bookmarks
    // -------------------------------------------------------------------------

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Article::class, 'bookmarks')->withTimestamps();
    }

    public function hasLiked(Model $likeable): bool
    {
        return $this->likes()
            ->where('likeable_type', get_class($likeable))
            ->where('likeable_id', $likeable->id)
            ->exists();
    }

    public function hasBookmarked(Article $article): bool
    {
        return $this->bookmarks()->where('article_id', $article->id)->exists();
    }

    // -------------------------------------------------------------------------
    // Notifications
    // -------------------------------------------------------------------------

    public function notifications()
    {
        return $this->hasMany(Notification::class)->latest();
    }

    public function unreadNotifications()
    {
        return $this->hasMany(Notification::class)->whereNull('read_at');
    }

    // -------------------------------------------------------------------------
    // Scopes
    // -------------------------------------------------------------------------

    public function scopeAuthors(Builder $query)
    {
        return $query->whereIn('role', ['author', 'editor', 'admin']);
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', true);
    }

    public function scopeVerified(Builder $query)
    {
        return $query->where('is_verified', true);
    }

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    #[Override]
    public function getRouteKeyName()
    {
        return 'username';
    }

    public function getAvatarAttribute(): string
    {
        return $this->profile->avatar_url;
    }
}
