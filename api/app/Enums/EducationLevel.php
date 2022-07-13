<?php
declare(strict_types=1);
namespace App\Enums;

use App\Traits\EnumToString;

enum EducationLevel: string
{
    use EnumToString;

    case PRIMARY = 'primary';
    case SECONDARY = 'secondary';
    case TERTIARY = 'tertiary';

    public static function toString(): string
    {
        return self::concatToString(self::cases());
    }
}
