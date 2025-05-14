<?php
return [
    'base_url' => ('https://maarif-backend.bylinelms.com/'), // default if env missing
    'base_url_API' => env('OPENAPI_BASE_URL', 'https://maarif-backend.bylinelms.com/api/'), // default if env missing
    'api_key' => env('OPENAPI_KEY', ''), // API Key from .env
];
