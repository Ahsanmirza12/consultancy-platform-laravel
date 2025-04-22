<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PackageSubscribed extends Notification
{
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Package Subscribed')
            ->greeting('Hello ' . $notifiable->first_name)
            ->line('Congratulations! Your package has been subscribed successfully.')
            ->action('View Package', url('/your-package-url'))
            ->line('Thank you for using Consultancy!');
    }
}

