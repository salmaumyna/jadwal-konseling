<?php

namespace App\Channels;

use App\Enums\NotificationCategory;
use Illuminate\Notifications\Channels\DatabaseChannel as IlluminateDatabaseChannel;
use Illuminate\Notifications\Notification;

class DatabaseChannel extends IlluminateDatabaseChannel
{
    /**
     * Send the given notification.
     *
     * @param mixed                                  $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @return array
     */
    public function buildPayload($notifiable, Notification $notification)
    {
        $category = method_exists($notification, 'category')
            ? $notification->category()->value
            : NotificationCategory::General->value;

        return [
            'id' => $notification->id,
            'type' => get_class($notification),
            'data' => method_exists($notification, 'toDatabase')
                ? $notification->toDatabase($notifiable)->toArray()
                : [],
            'read_at' => null,
            'category' => strlen($category) > 30 ? substr($category, 0, 30) : $category,
        ];
    }
}