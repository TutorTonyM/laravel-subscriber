<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Alert Modal Title (Success)
    |--------------------------------------------------------------------------
    |
    | This value activates the use of google re-captcha on the subscriber form.
    | If this value is set to true, all the mechanisms to enable the Google
    | re-captcha will be enabled. Also, the form won't be sent without passing
    | the re-captcha validation.
    |
    */
    'alert-modal-title-success' => env('SUBSCRIBER_ALERT_MODAL_TITLE_SUCCESS', 'Subscribed Successfully'),

    /*
    |--------------------------------------------------------------------------
    | Alert Modal Message (Success)
    |--------------------------------------------------------------------------
    |
    | This value activates the use of google re-captcha on the subscriber form.
    | If this value is set to true, all the mechanisms to enable the Google
    | re-captcha will be enabled. Also, the form won't be sent without passing
    | the re-captcha validation.
    |
    */
    'alert-modal-message-success' => env('SUBSCRIBER_ALERT_MODAL_MESSAGE_SUCCESS', 'Your subscription was successful. You will receive exclusive offers via email.'),

    /*
    |--------------------------------------------------------------------------
    | Alert Modal Title (Fail)
    |--------------------------------------------------------------------------
    |
    | This value activates the use of google re-captcha on the subscriber form.
    | If this value is set to true, all the mechanisms to enable the Google
    | re-captcha will be enabled. Also, the form won't be sent without passing
    | the re-captcha validation.
    |
    */
    'alert-modal-title-fail' => env('SUBSCRIBER_ALERT_MODAL_TITLE_FAIL', 'Subscription Failed'),

    /*
    |--------------------------------------------------------------------------
    | Alert Modal Message (Fail)
    |--------------------------------------------------------------------------
    |
    | This value activates the use of google re-captcha on the subscriber form.
    | If this value is set to true, all the mechanisms to enable the Google
    | re-captcha will be enabled. Also, the form won't be sent without passing
    | the re-captcha validation.
    |
    */
    'alert-modal-message-fail' => env('SUBSCRIBER_ALERT_MODAL_MESSAGE_FAIL', 'Something went wrong and your subscription could not be sent. Please try again later.'),

    /*
    |--------------------------------------------------------------------------
    | Alert Modal Title (Fail)
    |--------------------------------------------------------------------------
    |
    | This value activates the use of google re-captcha on the subscriber form.
    | If this value is set to true, all the mechanisms to enable the Google
    | re-captcha will be enabled. Also, the form won't be sent without passing
    | the re-captcha validation.
    |
    */
    'recaptcha-modal-title' => env('SUBSCRIBER_RECAPTCHA_MODAL_TITLE', 'You are almost done'),

    /*
    |--------------------------------------------------------------------------
    | Alert Modal Message (Fail)
    |--------------------------------------------------------------------------
    |
    | This value activates the use of google re-captcha on the subscriber form.
    | If this value is set to true, all the mechanisms to enable the Google
    | re-captcha will be enabled. Also, the form won't be sent without passing
    | the re-captcha validation.
    |
    */
    'recaptcha-modal-message' => env('SUBSCRIBER_RECAPTCHA_MODAL_MESSAGE', 'We just need to make sure you are not a robot!'),

    /*
    |--------------------------------------------------------------------------
    | Google Re-Captcha Key
    |--------------------------------------------------------------------------
    |
    | This value activates the use of google re-captcha on the subscriber form.
    | If this value is set to true, all the mechanisms to enable the Google
    | re-captcha will be enabled. Also, the form won't be sent without passing
    | the re-captcha validation.
    |
    */
    'google_recaptcha' => env('GOOGLE_RECAPTCHA', false),

    /*
    |--------------------------------------------------------------------------
    | Google Re-Captcha Key
    |--------------------------------------------------------------------------
    |
    | This value holds the Google re-captcha site key.
    | This value is used to make the request to the Google API.
    |
    */
    'google_recaptcha_site_key' => env('GOOGLE_RECAPTCHA_SITE_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Google Re-Captcha Secret
    |--------------------------------------------------------------------------
    |
    | This value holds the Google re-captcha secret key.
    | This value is used to validate the token from the Google API.
    |
    */
    'google_recaptcha_secret_key' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
];
