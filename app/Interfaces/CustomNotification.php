<?php

namespace App\Interfaces;

use App\Enums\NotificationCategory;
use App\Message\DatabaseNotificationMessage;

interface CustomNotification {
    public function toDatabase($notifiable): DatabaseNotificationMessage;
    public function category(): NotificationCategory;
}