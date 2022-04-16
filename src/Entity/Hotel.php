<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    //#[ORM\ManyToOne(targetEntity: Admin::class, inversedBy: 'hotel')]
    //#[ORM\JoinColumn(nullable: false)]
    //private $admin;

    #[ORM\OneToOne(inversedBy: 'hotel', targetEntity: Manager::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $manager;

    #[ORM\OneToMany(mappedBy: 'hotel', targetEntity: Suite::class)]
    private $suite;

    public function __construct()
    {
        $this->suite = new ArrayCollection();
    }

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

    //public function getAdmin(): ?Admin
    //{
    //    return $this->admin;
    //}

    //public function setAdmin(?Admin $admin): self
    //{
    //    $this->admin = $admin;

    //    return $this;
    //}

    public function getManager(): ?Manager
    {
        return $this->manager;
    }

    public function setManager(Manager $manager): self
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * @return Collection<int, Suite>
     */
    public function getSuite(): Collection
    {
        return $this->suite;
    }

    public function addSuite(Suite $suite): self
    {
        if (!$this->suite->contains($suite)) {
            $this->suite[] = $suite;
            $suite->setHotel($this);
        }

        return $this;
    }

    public function removeSuite(Suite $suite): self
    {
        if ($this->suite->removeElement($suite)) {
            // set the owning side to null (unless already changed)
            if ($suite->getHotel() === $this) {
                $suite->setHotel(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->hotelName;
    }

}
