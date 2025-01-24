<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Midtrans Configuration
    |--------------------------------------------------------------------------
    |
    | Berisi konfigurasi untuk integrasi Midtrans, termasuk Server Key, Client Key,
    | Merchant ID, dan mode (sandbox/production).
    |
    */

    'server_key' => env('MIDTRANS_SERVER_KEY', ''), // Server Key dari Midtrans
    'client_key' => env('MIDTRANS_CLIENT_KEY', ''), // Client Key dari Midtrans
    'merchant_id' => env('MIDTRANS_MERCHANT_ID', ''), // Merchant ID dari Midtrans
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false), // Mode production (true/false)
    'is_sanitized' => true, // Sanitized input
    'is_3ds' => true, // Enable 3D Secure
];