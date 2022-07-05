<?php
declare(strict_types=1);
namespace App\Enums;

enum KitSize: string
{
    case SMALL = 's';
    case MEDIUM = 'm';
    case LARGE = 'l';
    case EXTRA_LARGE = 'xl';

    public static function toString(): string
    {
        $string = '';
        $casesLength = count(self::cases()) - 1;
        $iteration = 0;
        foreach (self::cases() as $case) {
            $string = $iteration === $casesLength ? $string . $case->value : $string . $case->value . ',';
            $iteration++;
        }
        return $string;
    }
}
