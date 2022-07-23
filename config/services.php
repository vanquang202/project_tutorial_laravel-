<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
            'client_id' => '492481953658-71mfqrf913to28uihgsi0onsp7iiudjt.apps.googleusercontent.com',
            'client_secret' => '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',
            'redirect' => 'https://api.laravel.org/callback',
    ],

    'facebook' => [
        'client_id' => "607824881048290",
        'client_secret' => "cbf2c7f94183cffc8f3628fa1cc8140d",
        'redirect' => 'https://api.laravel.org/callback',
    ],

    'github' => [
        'client_id' => 'a39fd0107d1f71c2ab25',
        'client_secret' => 'b960eb168563654a97754cc8e62e2dadac13123c',
        'redirect' => 'https://api.laravel.org/callback',
    ],
];