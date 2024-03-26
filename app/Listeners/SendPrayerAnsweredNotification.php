<?php

namespace App\Listeners;

use App\Events\PrayerAnswered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use AfricasTalking\SDK\AfricasTalking;

class SendPrayerAnsweredNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(PrayerAnswered $event)
    {
        $user = $event->user;

        $username = env('AFRICASTALKING_USERNAME');
        $apiKey = env('AFRICASTALKING_API_KEY');

        $AT = new AfricasTalking($username, $apiKey);

        // Initialize a service
        $sms = $AT->sms();

        // Compose the message
        $message = "Dear {$user->fname}, your prayer has been answered successfully.";

        // Send the message
        $result = $sms->send([
            'to' => $user->phone,
            'message' => $message
        ]);

        // Handle errors
        if ($result['status'] !== 'success') {
            // Log or handle error
        }
    }
}
