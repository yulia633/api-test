<?php

declare(strict_types=1);

use Slim\Routing\RouteCollectorProxy;

$app->get('/', 'App\Controller\AdController:getTest');

$app->group('/api/v1', function (RouteCollectorProxy $group): void {
  //  $group->get('/adstest', 'App\Controller\AdController:getAll');

    $group->get('/ads', 'App\Controller\AdController:getAllAds');

    $group->get('/ads/{id}', 'App\Controller\AdController:getAd');

    $group->post('/ads', 'App\Controller\AdController:addAd');
});
