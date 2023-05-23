<?php

namespace App\Entity;

use App\Repository\SheduleResaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SheduleResaRepository::class)]
class SheduleResa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $shedule = null;

    #[ORM\Column(length: 255)]
    private ?string $period = null;

    #[ORM\OneToMany(mappedBy: 'shedule_resa', targetEntity: Reservation::class)]
    private Collection $reservations;


    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShedule(): ?string
    {
        return $this->shedule;
    }

    public function setShedule(string $shedule): self
    {
        $this->shedule = $shedule;

        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getreservations(): Collection
    {
        return $this->reservations;
    }

    public function addreservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setSheduleResa($this);
        }

        return $this;
    }

    public function removereservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getSheduleResa() === $this) {
                $reservation->setSheduleResa(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->shedule;
    }


}
