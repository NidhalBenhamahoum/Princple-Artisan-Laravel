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
        'client_id' => '116399087720-ca62nd478604p8n6ctqeivf3l7v4d14v.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],

    'facebook' => [
        'client_id' => '1600785257343505',
        'client_secret' => '79bc05a9bff5b98f10a528cd62831250',
        'redirect' => '127.0.0.1:8000/auth/facebook',
    ],


];