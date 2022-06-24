<?php

namespace App\Entity;

use App\Repository\SuiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuiteRepository::class)]
class Suite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $suiteName;

    #[ORM\Column(type: 'text')]
    private $suiteDescription;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $suitePrice;

    #[ORM\Column(type: 'string', length: 255)]
    private $suiteSlug;

    #[ORM\OneToMany(mappedBy: 'suite', targetEntity: Image::class, orphanRemoval: true)]
    private $images;

    #[ORM\OneToMany(mappedBy: 'suite', targetEntity: Booking::class, orphanRemoval: true)]
    private $bookings;

    #[ORM\ManyToOne(targetEntity: Manager::class, inversedBy: 'suite')]
    #[ORM\JoinColumn(nullable: false)]
    private $manager;

    #[ORM\ManyToOne(targetEntity: Hotel::class, inversedBy: 'suite')]
    #[ORM\JoinColumn(nullable: false)]
    private $hotel;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->bookings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuiteName(): ?string
    {
        return $this->suiteName;
    }

    public function setSuiteName(string $suiteName): self
    {
        $this->suiteName = $suiteName;

        return $this;
    }

    public function getSuiteDescription(): ?string
    {
        return $this->suiteDescription;
    }

    public function setSuiteDescription(string $suiteDescription): self
    {
        $this->suiteDescription = $suiteDescription;

        return $this;
    }

    public function getSuitePrice(): ?string
    {
        return $this->suitePrice;
    }

    public function setSuitePrice(?string $suitePrice): self
    {
        $this->suitePrice = $suitePrice;

        return $this;
    }

    public function getSuiteSlug(): ?string
    {
        return $this->suiteSlug;
    }

    public function setSuiteSlug(string $suiteSlug): self
    {
        $this->suiteSlug = $suiteSlug;

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setSuite($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getSuite() === $this) {
                $image->setSuite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Booking>
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setSuite($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getSuite() === $this) {
                $booking->setSuite(null);
            }
        }

        return $this;
    }

    public function getManager(): ?Manager
    {
        return $this->manager;
    }

    public function setManager(?Manager $manager): self
    {
        $this->manager = $manager;

        return $this;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(?Hotel $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    public function __toString()
    {
        return $this->suiteName;
    }

}
