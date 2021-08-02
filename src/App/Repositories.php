<?php

declare(strict_types=1);

use App\Repository\AdsRepository;
use Psr\Container\ContainerInterface;

$container->set('ads_repository', function (ContainerInterface $container): AdsRepository {
    return new AdsRepository($container->get('db'));
});
