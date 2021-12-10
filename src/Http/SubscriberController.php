<?php

namespace TutorTonyM\Subscriber\Http;

use TutorTonyM\Subscriber\Http\Controllers\Controller;
use TutorTonyM\Subscriber\Http\Requests\SubscriberValidation;
use TutorTonyM\Subscriber\Models\Subscriber;
use Exception;

class SubscriberController extends Controller
{
    public function store(SubscriberValidation $request)
    {
        $validated = $request->validated();

        try {
            Subscriber::create($validated);

            return response()->json([
                'success' => true,
                'alert_title' => 'Subscribed Successfully',
                'alert_message' => 'Your subscription has been sent successfully. You will be receiving exclusive offers via email.'
            ]);
        }
        catch (Exception $e){
            $errorMessage = config('app.env') == 'production'
                ? 'Something went wrong and your message could not be sent. Please try again later.'
                : 'Something went wrong and your message could not be sent. Please try again later.'.' Error Message: '.$e->getMessage();

            return response()->json([
                'success' => false,
                'alert_title' => 'Sent Failed',
                'alert_message' => $errorMessage,
            ]);
        }
    }
}