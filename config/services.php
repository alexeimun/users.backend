<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [

        'application_name' => 'Plataforma AMiGAS',
        
        'client_id' => env('GOOGLE_CLIENT',null),
       
        'client_secret' => env('GOOGLE_SECRET',null),
        
        'redirect_uri' => 'http://aulasamigas.com/google',
        
        'access_type' => 'offline',

        'state' => null,

        // Simple API access key, also from the API console. Ensure you get
        // a Server key, and not a Browser key.
        'developer_key' => ''
    ]

];