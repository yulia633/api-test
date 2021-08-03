<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Ads;

final class AdsRepository extends BaseRepository
{
    public function getQueryAdsByPage(): string
    {
        return "
            SELECT title, price, photo, name, organization
            FROM ads
            LEFT JOIN `users` users ON ads.user_id = users.id
            ORDER BY ads.id
        ";
    }

    public function getAdsByPage(
        int $page,
        int $perPage,
        ?string $title,
        ?string $price,
        ?string $photo,
        ?string $name,
        ?string $organization
    ): array {
        $params = [
            'title' => is_null($title) ? '' : $title,
            'price' => is_null($price) ? '' : $price,
            'photo' => is_null($photo) ? '' : $photo,
            'name' => is_null($name) ? '' : $name,
            'organization' => is_null($organization) ? '' : $organization,
        ];
        $query = $this->getQueryAdsByPage();
        $statement = $this->database->prepare($query);
        $statement->bindParam('title', $params['title']);
        $statement->bindParam('price', $params['price']);
        $statement->bindParam('photo', $params['photo']);
        $statement->bindParam('name', $params['name']);
        $statement->bindParam('organization', $params['organization']);
        $statement->execute();
        $total = $statement->rowCount();

        return $this->getResultsWithPagination(
            $query,
            $page,
            $perPage,
            $params,
            $total
        );
    }

    public function getAllAds(): array
    {
        $query = 'SELECT * FROM ads ORDER BY id';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }

    //short query
    public function getAdById(int $adId): Ads
    {
        $query = "SELECT ad.title, ad.price, ad.photo
        FROM ads ad
        WHERE ad.id = :id";

        $statement = $this->database->prepare($query);
        $statement->bindParam(':id', $adId);
        $statement->execute();
        $ad = $statement->fetchObject(Ads::class);

        if (!$ad) {
            throw new \Exception('Ad not found', 404);
        }

        return $ad;
    }

    //long query
    public function getAd(int $adId): Ads
    {
        $query = 'SELECT ad.title, ad.price, ad.description, ad.photo,
        users.name, users.surname, users.patronymic, users.organization,
        GROUP_CONCAT(photo.photo) as addPhoto
        FROM ads ad
        LEFT JOIN photos photo ON photo.ad_id = ad.id
        LEFT JOIN users users ON ad.user_id = users.id
        WHERE ad.id = :id';

        $statement = $this->database->prepare($query);
        $statement->bindParam(':id', $adId);
        $statement->execute();
        $ad = $statement->fetchObject(Ads::class);

        if (!$ad) {
            throw new \Exception('Ad not found', 404);
        }

        return $ad;
    }
}
