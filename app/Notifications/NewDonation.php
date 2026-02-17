<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewDonation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $payment, public $case)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
           ->subject('New Donation Received')
            ->line('A new donation has been received.')
            ->line('Cause: ' . $this->case->title_trans)
            ->line('Amount: ' . $this->payment->amount)
            ->line('Gateway: ' . $this->payment->payment_gateway)
            ->action('View donations', route('front.donation'));
    }

    public function toDatabase(object $notifiable): array
    {
        return [
             'msg' => 'New donation received',
            'cause_id' => $this->case->id,
            'cause_title' => $this->case->title_trans,
            'amount' => $this->payment->amount,
            'payment_id' => $this->payment->id,
            'gateway' => $this->payment->payment_gateway,
        ];
    }
    public function toArray(object $notifiable): array
    {
        return [

        ];
    }
}
