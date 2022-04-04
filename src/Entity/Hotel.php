<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $hotelName;

    #[ORM\Column(type: 'string', length: 255)]
    private $hotelCity;

    #[ORM\Column(type: 'string', length: 255)]
    private $hotelAddress;

    #[ORM\Column(type: 'text')]
    private $hotelDescription;

    #[ORM\Column(type: 'string', length: 255)]
    private $hotelSlug;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHotelName(): ?string
    {
        return $this->hotelName;
    }

    public function setHotelName(string $hotelName): self
    {
        $this->hotelName = $hotelName;

        return $this;
    }

    public function getHotelCity(): ?string
    {
        return $this->hotelCity;
    }

    public function setHotelCity(string $hotelCity): self
    {
        $this->hotelCity = $hotelCity;

        return $this;
    }

    public function getHotelAddress(): ?string
    {
        return $this->hotelAddress;
    }

    public function setHotelAddress(string $hotelAddress): self
    {
        $this->hotelAddress = $hotelAddress;

        return $this;
    }

    public function getHotelDescription(): ?string
    {
        return $this->hotelDescription;
    }

    public function setHotelDescription(string $hotelDescription): self
    {
        $this->hotelDescription = $hotelDescription;

        return $this;
    }

    public function getHotelSlug(): ?string
    {
        return $this->hotelSlug;
    }

    public function setHotelSlug(string $hotelSlug): self
    {
        $this->hotelSlug = $hotelSlug;

        return $this;
    }
}
