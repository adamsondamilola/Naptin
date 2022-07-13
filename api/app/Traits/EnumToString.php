<?php

namespace App\Traits;

trait EnumToString
{
    private static function concatToString(array $enumCases): string
    {
        $string = '';
        $casesLength = count($enumCases) - 1;
        $iteration = 0;
        foreach ($enumCases as $case) {
            $string = $iteration === $casesLength ? $string . $case->value : $string . $case->value . ',';
            $iteration++;
        }
        return $string;
    }
}
