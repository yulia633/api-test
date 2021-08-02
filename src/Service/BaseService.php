<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\AdsRepository;

abstract class BaseService
{
    protected AdsRepository $adsRepository;

    public function __construct(
        AdsRepository $adsRepository
    )
    {
        $this->adsRepository = $adsRepository;
    }
}
