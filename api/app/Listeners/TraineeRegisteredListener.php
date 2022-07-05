<?php
declare(strict_types=1);
namespace App\Listeners;

use App\Events\TraineeRegisteredEvent;
use App\Notifications\SendEmailVerificationNotification;

class TraineeRegisteredListener
{
    public function __construct()
    {
        //
    }

    public function handle(TraineeRegisteredEvent $event): void
    {
        $event->user->notify(new SendEmailVerificationNotification());
    }
}
