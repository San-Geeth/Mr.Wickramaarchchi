<?php


return [
    'dev' => [
        'access_payhere' => env('PAYHERE_URL_DIV', 'https://sandbox.payhere.lk/pay/checkout'),
        'merchant_id' => env('MERCHANT_ID', '1216077'),
        'merchant_secret' => env('MERCHANT_SECRET', '4jvoaNHPcxO8X6D9fMFpbO8WzilTC6XjV8gnAgeBWQRK'),
    ],
    'pro' => [
        'access_payhere' => env('PAYHERE_URL', 'https://www.payhere.lk/pay/checkout'),
        'merchant_id' => env('MERCHANT_ID', '1216077'),
        'merchant_secret' => env('MERCHANT_SECRET', '4jvoaNHPcxO8X6D9fMFpbO8WzilTC6XjV8gnAgeBWQRK'),
    ]

];
