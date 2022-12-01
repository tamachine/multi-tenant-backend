<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendWelcomeMail extends Notification implements ShouldQueue
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
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $appName = config('app.name');
        $token = app('auth.password')->createToken($notifiable);

        return (new MailMessage)
                    ->subject("$appName: Account created")
                    ->greeting('Hello!')
                    ->line("An account has been created for you on $appName")
                    ->line('For security purposes you must set your own password within the next 24 hours. Please click the button below to set your password. Once set you will be automatically logged in.')
                    ->action(
                        'Set your password',
                        route('password.reset', ['token' => $token])
                    )
                    ->line('If the link has expired, you can manually set your password by going to ' . url('password/reset') . ' and entering this email address: ' . $notifiable->email)
                    ->line('Thank you for using ' . $appName);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
