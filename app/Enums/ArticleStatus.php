<?php

namespace App\Enums;

enum ArticleStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case SCHEDULED = 'scheduled';
    case ARCHIVE = 'archive';

    public static function imploaded(): string
    {
        return implode(',', array_map(fn($status) => $status->value, self::cases()));
    }

    public function getLabel(): string
    {
        return ucfirst($this->value);
    }
}
