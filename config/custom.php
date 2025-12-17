<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Business Configuration
    |--------------------------------------------------------------------------
    */

    'business' => [
        'working_hours' => env('BUSINESS_WORKING_HOURS', 'Mon-Fri, 09:00 - 17:00'),
        'currency_code' => env('BUSINESS_CURRENCY', 'IDR'),
        'currency_symbol' => env('BUSINESS_CURRENCY_SYMBOL', 'Rp'),
        'tax_rate' => env('BUSINESS_TAX_RATE', 11), // PPn 11%
    ],

    /*
    |--------------------------------------------------------------------------
    | Feature Flags
    |--------------------------------------------------------------------------
    */

    'features' => [
        'dark_mode' => env('FEATURE_DARK_MODE', true),
        'multi_language' => env('FEATURE_MULTI_LANGUAGE', true),
        'api_access' => env('FEATURE_API_ACCESS', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | External Service Keys (Non-Laravel Standard)
    |--------------------------------------------------------------------------
    */

    'services' => [
        'whatsapp_number' => env('SERVICE_WHATSAPP', '628123456789'),
        'telegram_bot_id' => env('SERVICE_TELEGRAM', ''),
    ],
];
