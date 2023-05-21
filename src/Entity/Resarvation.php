<?php

namespace App\Entity;

use App\Repository\ResarvationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResarvationRepository::class)]
class Resarvation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'resarvations')]
    private ?SheduleResa $shedule_resa = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSheduleResa(): ?SheduleResa
    {
        return $this->shedule_resa;
    }

    public function setSheduleResa(?SheduleResa $shedule_resa): self
    {
        $this->shedule_resa = $shedule_resa;

        return $this;
    }
}
