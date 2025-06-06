<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Winner extends Notification
{
    use Queueable;
    public $ticket_number;
    /**
     * Create a new notification instance.
     */
    public function __construct($ticket_number)
    {
        //
        $this->ticket_number = $ticket_number;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
     public function toDatabase($notifiable)
    {
        return [
            'title' => '🎉 Congratulations!',
            'message' => 'You are the winner!  ticket number: '. $this->ticket_number,
        ];
    }

}
