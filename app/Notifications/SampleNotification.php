<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Interfaces\CustomNotification;
use App\Message\DatabaseNotificationMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class SampleNotification extends Notification implements ShouldQueue, CustomNotification
{
    use Queueable;

    private string $actor;
    private string $message;
    private string $ctaLink;

    public function __construct(string $message, string $actor = '', string $ctaLink = '')
    {
        $this->actor = $actor;
        $this->message = $message;
        $this->ctaLink = $ctaLink;
    }

    function category() : NotificationCategory {
        return NotificationCategory::General;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): DatabaseNotificationMessage
    {
        return (new DatabaseNotificationMessage)
            ->actor($this->actor)
            ->message($this->message)
            ->ctaLink($this->ctaLink);
    }
}
