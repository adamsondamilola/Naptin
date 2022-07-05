<?php
declare(strict_types=1);
namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class SendEmailVerificationNotification extends VerifyEmail
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Verify ' . config('app.name') . ' Account')
                    ->view('emails.auth.verify-email', [
                        'firstName' => $notifiable->detail->first_name,
                        'verificationUrl' => $this->verificationUrl($notifiable)
                    ]);
    }
}
