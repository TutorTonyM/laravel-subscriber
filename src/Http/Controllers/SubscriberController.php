<?php

namespace TutorTonyM\Subscriber\Http\Controllers;

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
                'alert_title' => config('ttm-subscriber.alert-modal-title-success'),
                'alert_message' => config('ttm-subscriber.alert-modal-message-success')
            ]);
        }
        catch (Exception $e){
            $errorMessage = config('app.env') == 'production'
                ? config('ttm-subscriber.alert-modal-message-fail')
                : config('ttm-subscriber.alert-modal-message-fail').' Error Message: '.$e->getMessage();

            return response()->json([
                'success' => false,
                'alert_title' => config('ttm-subscriber.alert-modal-title-fail'),
                'alert_message' => $errorMessage,
            ]);
        }
    }
}