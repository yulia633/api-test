<?php

$container->set('database', function () {
   return [
        "DATABASE_HOST" => getenv('DATABASE_HOST'),
        "DATABASE_NAME" =>  getenv('DATABASE_NAME'),
        "DATABASE_USER" =>  getenv('DATABASE_USER'),
        "DATABASE_PASSWORD" =>  getenv('DATABASE_PASSWORD'),
        "DATABASE_CHAR" => 'utf8'
    ];
});
