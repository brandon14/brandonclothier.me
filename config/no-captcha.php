<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Credentials
     |--------------------------------------------------------------------------
     | NoCAPTCHA credentials.
     |
     */

    'secret'  => env('NOCAPTCHA_SECRET') ?: 'no-captcha-secret',
    'sitekey' => env('NOCAPTCHA_SITEKEY') ?: 'no-captcha-sitekey',

    /*
     |--------------------------------------------------------------------------
     | Localization
     |---------------------------------------------------------------------------
     | NoCAPTCHA language.
     |
     */

    'lang'    => app()->getLocale(),

    /*
     |--------------------------------------------------------------------------
     | Attributes
     |--------------------------------------------------------------------------
     | NoCAPTCHA widget attributes.
     |
     */

    'attributes' => [
        'data-theme' => env('NOCAPTCHA_THEME', 'light'),
        'data-type'  => env('NOCAPTCHA_TYPE', 'image'),
        'data-size'  => env('NOCAPTCHA_SIZE', 'normal'),
    ],
];
