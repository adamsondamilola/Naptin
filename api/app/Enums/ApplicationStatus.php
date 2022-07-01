<?php
declare(strict_types=1);
namespace App\Enums;

enum ApplicationStatus: string
{
    case PROSPECTIVE = 'prospective';
    case SHORT_LISTED = 'short listed';
    case CONFIRMED = 'confirmed';
}
