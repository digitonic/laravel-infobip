<?php

return [
    'domain' => env('INFOBIP_DOMAIN', 'https://yourdomain.api.infobip.com'),
    'prefix' => env('INFOBIP_PREFIX', 'App'),
    'secret' => env('INFOBIP_KEY', 'secret'),
    'timeout' => env('INFOBIP_TIMEOUT', 60),
];
