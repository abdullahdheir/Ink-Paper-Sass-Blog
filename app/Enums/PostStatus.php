<?php

namespace App\Enums;

enum ArticleStatus: string
{
    case PUBLISHED = 'published';
    case ARCHIVE = 'archive';
    case DRAFT = 'draft';
}
