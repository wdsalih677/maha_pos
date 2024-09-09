<?php

namespace App\Notifications;

use App\Models\clients\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\App;

class OrderCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $order , $client;

    public function __construct($order , $client)
    {
        $this->order = $order;
        $this->client = $client;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = 'http://127.0.0.1:8000/en/order_details/' . $this->order->id;
        return (new MailMessage)
                ->greeting('Dear customer '.$this->client->name.', welcome!')
                ->subject('Create Order')
                ->line('Your order has been created successfully. You can view it by clicking on the button below.')
                ->action('Your Order Details',  $url )
                ->line('Thank you for using our MahaSoft-POS!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
        ];
    }
}
