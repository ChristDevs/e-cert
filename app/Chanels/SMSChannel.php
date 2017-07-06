<?php

namespace App\Channels;

use App\Senders\SmsSender;
use Illuminate\Notifications\Notification;

class SMSChannel
{
    public function __construct(SmsSender $sms)
    {
        $this->sms = $sms;
    }
    /**
     * Send the given notification.
     *
     * @param mixed                                  $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSms($notifiable);
        $this->sms->sendMessage($notifiable->phone_number, $message);
    }
}
