<?php
declare(strict_types=1);
namespace App\Enums;

use App\Traits\EnumToString;

enum KitSize: string
{
    use EnumToString;
    
    case SMALL = 's';
    case MEDIUM = 'm';
    case LARGE = 'l';
    case EXTRA_LARGE = 'xl';

    public static function toString(): string
    {
        return self::concatToString(self::cases());
    }
}
