<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FollowUpReminder extends Notification
{
    use Queueable;

    protected $followUp;

    public function __construct($followUp)
    {
        $this->followUp = $followUp;
    }

    public function via($notifiable)
    {
        return ['mail']; // You can also add 'database', 'nexmo', etc.
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Follow-Up Reminder')
            ->line('You have a follow-up: ' . $this->followUp->title)
            ->line('Scheduled Date: ' . $this->followUp->reminder_date)
            ->line('Status: ' . $this->followUp->status)
            ->action('View Follow-Up', route('admin.client.followUp' , $this->followUp->faker_id))
            ->line('Please check your follow-ups.');
    }

}
