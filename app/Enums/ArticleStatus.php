<?php

namespace App\Enums;

enum ArticleStatus: string
{
    case PUBLISHED = 'published';
    case SCHEDULED = 'scheduled';
    case ARCHIVE = 'archive';
    case DRAFT = 'draft';
}
