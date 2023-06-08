<?php
return [
    'url' => env('VALITOR_URL', 'https://paymentweb.uat.valitor.is/'),    
    'merchant_id' => env('VALITOR_MERCHANT_ID', '1'),
    'verification_code' => env('VALITOR_VERIFICATION_CODE', '12345'),  
    'currency' => env('VALITOR_CURRENCY', 'ISK'),
];
