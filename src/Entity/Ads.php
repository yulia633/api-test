<?php

declare(strict_types=1);

namespace App\Entity;

final class Ads
{
    private int $id;

    private string $title;

    private string $description;

    private float $price;

    private array $photos;

    private string $date;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getPhotos(): array
    {
        return $this->photos;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTitle(string $title): void
    {
        if (iconv_strlen($title) > 200) {
            throw new \Exception("The number of characters in the title must be no more than 200", 401);
        }
        $this->title = $title;
    }

    public function setDescription(string $description): void
    {
        if (iconv_strlen($description) > 1000) {
            throw new \Exception("The number of characters in the description must be no more than 1000", 401);
        }
        $this->description = $description;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setPhotos(array $photos): void
    {
        if (empty($photos)) {
            throw new \Exception("The number of photos should not be empty", 401);
        }

        if (count($photos) > 3) {
            throw new \Exception("The number of photos should not be more than 3", 401);
        }

        $this->photos = $photos;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }
}
