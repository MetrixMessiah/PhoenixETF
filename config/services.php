<?php

return [
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

    'market_data' => [
        'provider' => env('MARKET_DATA_PROVIDER', 'default'),
        
        'alpha_vantage' => [
            'api_key' => env('ALPHA_VANTAGE_API_KEY'),
            'base_url' => 'https://www.alphavantage.co/query',
        ],
        
        'yahoo_finance' => [
            'api_key' => env('YAHOO_FINANCE_API_KEY'),
            'base_url' => 'https://yfapi.net/v6',
        ],
        
        'binance' => [
            'api_key' => env('BINANCE_API_KEY'),
            'api_secret' => env('BINANCE_API_SECRET'),
            'base_url' => 'https://api.binance.com/api/v3',
        ],
        
        'default' => [
            'cache_ttl' => 300, // 5 minutes
            'rate_limit' => 60, // requests per minute
        ],
    ],
]; 