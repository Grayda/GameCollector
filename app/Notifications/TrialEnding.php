<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TrialEnding extends Notification
{
    use Queueable;

    private $days = 2;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($days)
    {
        $this->days = $days;
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
        return (new MailMessage)
                    ->subject('Your ' . config('app.name') . ' trial will be ending soon!')
                    ->line('Your ' . config('app.name') . ' trial is due to expire in ' . $this->days . ' days time. If you wish to continue using ' . config('app.name') . ' then you don\'t need to do anything')
                    ->line('If you wish to adjust your plan or cancel, then please visit ' . url('/home') . '.')
                    ->line('And don\'t forget, you can always reply to this email, or join us on our Discord server to provide feedback, ask questions, request new features or just chat')
                    ->action('Log in to ' . config('app.name'), url('/home'));

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
