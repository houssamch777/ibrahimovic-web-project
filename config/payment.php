<?php

return [

    'satim' => [
        'base_url' => env('SATIM_BASE_URL', 'https://test.satim.dz/payment/rest/'),
        'username' => env('SATIM_USERNAME'),
        'password' => env('SATIM_PASSWORD'),
        'terminal_id' => env('SATIM_TERMINAL_ID'),
    ],

    'currency' => '012', // رمز العملة ISO للدينار الجزائري
    'language' => 'AR', // لغة واجهة بوابة الدفع
];