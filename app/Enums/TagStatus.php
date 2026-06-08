<?php

namespace App\Enums;

enum TagStatus: string
{
    case ACTIVE = 'active';
    case TRENDING = 'trending';
    case INACTIVE = 'inactive';
}
