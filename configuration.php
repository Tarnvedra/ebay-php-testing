<?php
/**
 * Configuration settings used by all of the examples.
 *
 * Specify your eBay application keys in the appropriate places.
 *
 * Be careful not to commit this file into an SCM repository.
 * You risk exposing your eBay application keys to more people than intended.
 */
return [
    'sandbox' => [
        'credentials' => [
            'devId'  => env('EBAY_SANDBOX_DEV_ID'),
            'appId'  => env('EBAY_SANDBOX_APP_ID'),
            'certId' => env('EBAY_SANDBOX_CERT_ID'),
        ],
        'authToken' => env('EBAY_SANDBOX_AUTH_TOKEN'),
        'oauthUserToken' => env('EBAY_SANDBOX_OAUTH_USER_TOKEN'),
        'ruName' => env('EBAY_SANDBOX_RU_NAME'),
    ],
    'production' => [
        'credentials' => [
            'devId' => env('EBAY_PRODUCTION_DEV_ID'),
            'certId' => env('EBAY_PRODUCTION_CERT_ID'),
        ],
        'authToken' => env('EBAY_PRODUCTION_AUTH_TOKEN'),
        'oauthUserToken' => env('EBAY_PRODUCTION_OAUTH_USER_TOKEN') ,
        'ruName' => env('EBAY_PRODUCTION_RU_NAME')
    ]
];
