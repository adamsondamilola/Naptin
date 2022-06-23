<?php
declare(strict_types=1);
namespace App\Listeners;

use App\Events\TraineeRegistered;
use App\Notifications\SendEmailVerificationNotification;

class TraineeRegisteredListener
{
    public function __construct()
    {
        //
    }

    public function handle(TraineeRegistered $event): void
    {
        $event->user->notify(new SendEmailVerificationNotification());
    }
}
