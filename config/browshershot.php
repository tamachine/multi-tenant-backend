<?php
return [
    'node_path' => env('NODE_PATH', '/usr/local/bin/node'),
    'npm_path' => env('NPM_PATH', '/usr/local/bin/npm'),
    'include_path' => env('INCLUDE_PATH', '$PATH:/usr/local/bin'),
    'username' => env('BROWSERSHOT_USERNAME'),
    'password' => env('BROWSERSHOT_PASSWORD'),
];
