<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Ads;

class AdsService extends BaseService
{
    public function getAdsByPage(
        int $page,
        int $perPage,
        ?string $title,
        ?string $price,
        ?string $photo,
        ?string $name,
        ?string $organization
    ): array {
        if ($page < 1) {
            $page = 1;
        }

        if ($perPage < 1) {
            $perPage = 10; //make const
        }

        return $this->adsRepository->getAdsByPage(
            $page,
            $perPage,
            $title,
            $price,
            $photo,
            $name,
            $organization
        );
    }


    public function getAllAds(): array
    {
        return $this->adsRepository->getAllAds();
    }

    public function getOneFull(int $id): object
    {
        return $this->adsRepository->getAd($id)->toJson();
    }

    public function getOne(int $id): object
    {
        return $this->adsRepository->getAdById($id)->toJson();
    }
}
