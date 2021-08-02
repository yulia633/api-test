<?php

declare(strict_types=1);

namespace App\Service;

class AdsService extends BaseService
{
    public function getAll(): array
    {
        return $this->adsRepository->getAll();
    }
}
