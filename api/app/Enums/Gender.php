<?php
declare(strict_types=1);
namespace App\Enums;

enum Gender: string
{
    case MALE = 'm';
    case FEMALE = 'f';

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
