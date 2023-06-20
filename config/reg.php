<?php

return [

    /*
    |--------------------------------------------------------------------------
    | HTTP client settings
    |--------------------------------------------------------------------------
    */

    'client' => [
        'base_uri' => 'https://api.reg.ru/api/regru2/',
        'timeout'  => 30.0,
        'verify'   => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Account
    |--------------------------------------------------------------------------
    */

    'default' => 'default',

    /*
    |--------------------------------------------------------------------------
    | Accounts
    |--------------------------------------------------------------------------
    */

    'accounts' => [
        'default' => [
            'username' => env('REG_USERNAME', 'username'),
            'password' => env('REG_PASSWORD', 'secret'),
        ],
    ],

];