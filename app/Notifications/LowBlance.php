<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LowBlance extends Notification
{
    use Queueable;




    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $my_notification = 'your have to add more blance to continue used  ';

    public function __construct($msg)
    {
        $this->my_notification = $msg;
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
            ->line('your Salla blance is :  ' . $this->my_notification)
            ->action('Deposit Now', url('https://s.salla.sa/login'))
            ->line('Please add more blance to continue use our services');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [];
    }
}
