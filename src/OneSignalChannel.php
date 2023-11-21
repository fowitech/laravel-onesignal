<?php

namespace Fowitech\OneSignal;

use Illuminate\Notifications\Notification;

class OneSignalChannel
{
    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param Notification $notification
     * @return bool
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toOneSignal($notifiable);

        if (!$userIds = $notifiable->routeNotificationFor('OneSignal', $notification)) {
            return false;
        }

        if (! $message instanceof OneSignalMessage) {
            return false;
        }

        $response = onesignal()->to([$userIds])->data($message->data)->send($message->title, $message->content);
        if (!$response['status']) {
            return false;
        }

        return true;
    }
}
