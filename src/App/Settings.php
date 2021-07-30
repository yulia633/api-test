<?php

declare(strict_types=1);

return [
    'settings' => [
        'db' => [
            'host' => getenv('DATABASE_HOST'),
            'name' => getenv('DATABASE_NAME'),
            'user' => getenv('DATABASE_USER'),
            'pass' => getenv('DATABASE_PASSWORD'),
            'port' => getenv('DATABASE_PORT_NUMBER'),
        ],
    ],
];
