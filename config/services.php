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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'stripe' => [
        'key' => 'pk_test_tx1oatPnanMYzcAm3Fw5XqRe',
        'secret' => 'sk_test_QBGGi6SRi4m9OwZBlqlRu7Id',
        //'key' => 'pk_test_51JOJlFSIwoyXxNkPDJJKPjURMrd80ajtdPegJXzyWtIVhcHDHCSPtGWq5J3w61oNbIevUopHzlsDZY3HVTffLidV000QejCNl6',
        //'secret' => 'sk_test_51JOJlFSIwoyXxNkPketIV0Rl2lEW2wPoAwgausF9Dhj8M0u1z02xsdLwPQlGhyIGwdADXW3kvE7ohvL82KVYh1Xo007Fr5tlO0',
    ],

];
