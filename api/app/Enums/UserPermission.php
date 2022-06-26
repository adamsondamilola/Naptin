<?php
declare(strict_types=1);
namespace App\Enums;

enum UserPermission: string
{
    case TRAINEE_MANAGEMENT = 'trainee management';
    case TRAINER_MANAGEMENT = 'trainer management';
    case TRAINING_PROGRAM_MANAGEMENT = 'training program management';
    case TRAINING_CENTER_MANAGEMENT = 'training center management';
    case MESSAGING_MANAGEMENT = 'messaging management';
    case SUPPORT_AND_HELPDESK_MANAGEMENT = 'Support and helpdesk management';
    case TRAINEE_COMPANY_MANAGEMENT = 'trainee company management';
    case REPORT = 'report';
}
