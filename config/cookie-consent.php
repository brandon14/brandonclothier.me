<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Enable Laravel Cookie Consent
     |--------------------------------------------------------------------------
     | Use this setting to enable the cookie consent dialog.
     |
     */

    'enabled' => env('COOKIE_CONSENT_ENABLED', true),

    /*
     |--------------------------------------------------------------------------
     | Laravel Cookie Consent Cookie Name
     |--------------------------------------------------------------------------
     | The name of the cookie in which we store if the user
     | has agreed to accept the conditions.
     |
     */

    'cookie_name' => env(
        'COOKIE_CONSENT_NAME',
        str_slug(env('APP_NAME', 'laravel'), '_').'_cookie_consent'
    ),
];
