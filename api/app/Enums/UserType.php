<?php
declare(strict_types=1);
namespace App\Enums;

enum UserType: string
{
    case TRAINEE = 'trainee';
    case TRAINER = 'trainer';
    case ADMIN = 'admin';
    case SUPER_ADMIN = 'super admin';

    public static function grantedPublicRegistration(): string
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

    public static function getTrainee(): string
    {
        return self::TRAINEE->value;
    }
}
