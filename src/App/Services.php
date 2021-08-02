<?php

declare(strict_types=1);

use App\Service\AdsService;
use Psr\Container\ContainerInterface;

$container->set('ads_service', function (ContainerInterface $container): AdsService {
    return new AdsService($container->get('ads_repository'));
});
