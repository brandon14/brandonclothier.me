<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Credentials
     |--------------------------------------------------------------------------
     | NoCAPTCHA credentials.
     |
     */
    'secret' => env('NOCAPTCHA_SECRET'),
    'sitekey' => env('NOCAPTCHA_SITEKEY'),
    /*
     |--------------------------------------------------------------------------
     | Options
     |--------------------------------------------------------------------------
     | NoCAPTCHA HTTP Guzzle client options.
     |
     */
    'options' => [
        'timeout' => 2.0,
    ],

    /*
     |--------------------------------------------------------------------------
     | Attributes
     |--------------------------------------------------------------------------
     | NoCAPTCHA element attributes.
     |
     */
    'attributes' => [
        'data-theme' => env('NOCAPTCHA_THEME', 'light'),
        'data-type'  => env('NOCAPTCHA_TYPE', 'image'),
        'data-size'  => env('NOCAPTCHA_SIZE', 'normal'),
    ],
];
