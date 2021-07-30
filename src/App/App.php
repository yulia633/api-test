<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

$settings = require __DIR__ . '/Settings.php';
$app = new \Slim\App($settings);
$container = $app->getContainer();

require __DIR__ . '/Dependencies.php';
require __DIR__ . '/Routes.php';

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->run();
