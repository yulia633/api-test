<?php

declare(strict_types=1);

namespace App\Repository;

final class AdsRepository extends BaseRepository
{
    public function getAll(): array
    {
        $query = 'SELECT `id`, `title`, `description`, `price`, `photo`, `date_created` FROM `ads` ORDER BY `id`';
        $statement = $this->database->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }
}
