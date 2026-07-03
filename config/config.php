<?php

return [
    'app_name' => getenv('APP_NAME') ?: 'LeadMiner',
    'env' => getenv('APP_ENV') ?: 'local',
    'debug' => getenv('APP_DEBUG') === 'true',
];
