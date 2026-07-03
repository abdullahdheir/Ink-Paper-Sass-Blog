<?php

namespace App\Models;

use App\Enums\ArticleStatus;
use App\Models\Scopes\OwnedByAuthScope;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

#[ScopedBy(OwnedByAuthScope::class)]
class Article extends Model
{
    /** @use HasFactory<ArticleFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'cover_image',
        'status',
        'reading_time',
        'is_featured',
        'allow_comments',
        'published_at',
        'scheduled_at',
        'views_count',
        'likes_count',
        'comments_count',
        'bookmarks_count',
    ];

    protected function casts(): array
    {
        return [
            'is_featured'    => 'boolean',
            'allow_comments' => 'boolean',
            'published_at'   => 'datetime',
            'scheduled_at'   => 'datetime',
            'status'         => ArticleStatus::class,
        ];
    }

    // -------------------------------------------------------------------------
    // Relationships
    // -------------------------------------------------------------------------

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id')->with('profile');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id')->with('replies');
    }

    public function allComments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function bookmarkedBy()
    {
        return $this->belongsToMany(User::class, 'bookmarks')->withTimestamps('created_at', null);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'article_id');
    }

    public function collaborators()
    {
        return $this->hasMany(Collaboration::class);
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    // -------------------------------------------------------------------------
    // Scopes
    // -------------------------------------------------------------------------

    public function scopeOwnedByAuth(Builder $query)
    {
        return $query->where('user_id', auth()->id());
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('status', ArticleStatus::PUBLISHED)
            ->where('published_at', '<=', now());
    }

    public function scopeDrafts(Builder $query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeFeatured(Builder $query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeForAuthor(Builder $query, int $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeInCategory(Builder $query, int $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeSearch(Builder $query, string $term)
    {
        return $query->whereFullText(['title', 'content', 'excerpt'], $term);
    }

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    public function getCoverUrlAttribute(): ?string
    {
        return $this->cover_image ? Storage::url($this->cover_image) : null;
    }

    public function getUrlAttribute(): string
    {
        return route('articles.show', $this->slug);
    }

    public function getContentAttribute(string $value): string
    {
        return str_replace('<p><br></p>', '', $value);
    }

    public function isLikedBy(User $user): bool
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function isBookmarkedBy(User $user): bool
    {
        return $this->bookmarkedBy()->where('user_id', $user->id)->exists();
    }

    public function publish(): void
    {
        $this->update([
            'status'       => 'published',
            'published_at' => now(),
        ]);

        $this->author->stats()->increment('articles_count');
    }

    public function unpublish(): void
    {
        $this->update([
            'status'       => 'draft',
            'published_at' => null,
        ]);

        $this->author->stats()->decrement('articles_count');
    }

    /**
     * Automatically clean content when saving.
     * Removes empty Quill paragraphs and sanitizes HTML.
     */
    public function setContentAttribute(string $value): void
    {
        $clean = Purifier::clean($value);

        // 1. Remove empty Quill paragraphs: <p><br></p>
        $clean = preg_replace('/<p>\s*<br\s*\/?>\s*<\/p>/i', '', $clean);

        // 2. Remove empty paragraphs: <p></p> or <p> </p>
        $clean = preg_replace('/<p>\s*<\/p>/i', '', $clean);

        // 3. Remove multiple consecutive <br> tags
        $clean = preg_replace('/(<br\s*\/?>){2,}/i', '<br>', $clean);

        // 4. Remove ** markdown leftover (Quill sometimes passes raw markdown from AI)
        $clean = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $clean);

        // 5. Trim whitespace
        $clean = trim($clean);

        $this->attributes['content'] = $clean;
    }

    // -------------------------------------------------------------------------
    // Static Helpers
    // -------------------------------------------------------------------------

    public static function generateSlug(string $title): string
    {
        $slug = Str::slug($title);
        $count = static::where('slug', 'LIKE', "{$slug}%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public static function estimateReadingTime(string $content): int
    {
        $wordCount = str_word_count(strip_tags($content));
        return (int) ceil($wordCount / 200); // 200 words per minute
    }
}
