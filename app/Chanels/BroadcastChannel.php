<?php

namespace App\Channels;

use App\Broadcast;
use Illuminate\Notifications\Notification;

class BroadcastChannel
{
    /**
     * Send the given notification.
     *
     * @param mixed                                  $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toArray();
        Broadcast::create(array_merge($message, ['data' => $message]));
    }
}
