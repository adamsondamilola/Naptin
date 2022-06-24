<?php
declare(strict_types=1);
namespace App\Enums;

enum UserType: string
{
    case TRAINEE = 'trainee';
    case TRAINER = 'trainer';
    case ADMIN = 'admin';

    public static function canCreateAccount(): string
    {
        $string = '';
        $iteration = 0;
        foreach (self::cases() as $case) {
            if ($case->value !== self::ADMIN->value) {
                $string = $iteration === (count(self::cases()) - 1) ? $string . $case->value : $string . $case->value . ',';
            }
            $iteration++;
        }
        return $string;
    }

    public static function getTrainer(): string
    {
        return self::TRAINER->value;
    }
}
