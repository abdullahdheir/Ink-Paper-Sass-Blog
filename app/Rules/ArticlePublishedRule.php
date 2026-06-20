<?php

namespace App\Rules;

use App\Enums\ArticleStatus;
use App\Models\Article;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class ArticlePublishedRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $article = Article::published()->where('id', '=', $value)->first();

        if (! $article) $fail('The article must be published to can users comment on it.');
    }

    public function __toString()
    {
        return 'article_published';
    }
}
