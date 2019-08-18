<?php

namespace Airranged\LaravelMagicLink\Notifications;

;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MagicLink extends Notification
{
    use Queueable;

    protected $user;
    protected $magic_link;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $magic_link)
    {
        $this->user = $user;
        $this->magic_link = $magic_link;
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
        return (new MailMessage)->view(
            'emails.magic_link',
            [
              'magic_link' => $this->magic_link,
              'user' => $this->user
            ]
        )->subject(config('app.name') . ' Sign In Link!');
    }
}
