<?php

return [

  // SANDBOX
  "sandbox_client_id" => env('PAYPAL_SANDBOX_CLIENT_ID'),
  "sandbox_secret" => env('PAYPAL_SANDBOX_SECRET'),

  // SANDBOX
  "live_client_id" => env('PAYPAL_LIVE_CLIENT_ID'),
  "live_secret" => env('PAYPAL_LIVE_SECRET'),


  // PAYPAL SDK CONFIGURATION

  "settings" => [
    // MODE [ SANDBOX || LIVE ]
    "mode" => env('PAYPAL_MODE'),
    //Connection TimeOut
    'http.ConnectionTimeOut' => 5000,
    //Logs
    'log.longEnabled' => true,
    'log.FileName' => storage_path() . '/logs/paypal.log',
    // LEVEL [ DEBUG, INFO, WARN, ERROR]
    'log.logLevel' => 'DEBUG'
  ]

];
