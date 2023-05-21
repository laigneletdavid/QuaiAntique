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

    #[ORM\OneToMany(mappedBy: 'shedule_resa', targetEntity: Resarvation::class)]
    private Collection $resarvations;


    public function __construct()
    {
        $this->resarvations = new ArrayCollection();
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
     * @return Collection<int, Resarvation>
     */
    public function getResarvations(): Collection
    {
        return $this->resarvations;
    }

    public function addResarvation(Resarvation $resarvation): self
    {
        if (!$this->resarvations->contains($resarvation)) {
            $this->resarvations->add($resarvation);
            $resarvation->setSheduleResa($this);
        }

        return $this;
    }

    public function removeResarvation(Resarvation $resarvation): self
    {
        if ($this->resarvations->removeElement($resarvation)) {
            // set the owning side to null (unless already changed)
            if ($resarvation->getSheduleResa() === $this) {
                $resarvation->setSheduleResa(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->shedule;
    }


}
