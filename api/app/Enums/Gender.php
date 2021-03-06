<?php
declare(strict_types=1);
namespace App\Enums;

use App\Traits\EnumToString;

enum Gender: string
{
    use EnumToString;

    case MALE = 'm';
    case FEMALE = 'f';

    public static function toString(): string
    {
        return self::concatToString(self::cases());
    }
}
