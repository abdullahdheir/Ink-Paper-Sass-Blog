<?php

namespace App\Enums;

enum PostStatus: string
{
    case PUBLISHED = 'published';
    case ARCHIVE = 'archive';

    case DRAFT = 'draft';
}
