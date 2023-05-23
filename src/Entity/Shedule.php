<?php

namespace App\Entity;

use App\Repository\SheduleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SheduleRepository::class)]
class Shedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column()]
    private ?int $day = null;

    #[ORM\Column]
    private ?bool $visible = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $noonStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $noonEnd = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $eveningStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $eveningEnd = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?int
    {
        return $this->day;
    }

    public function setDay(int $day): self
    {
        $this->day = $day;

        return $this;
    }
    public function isVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;

        return $this;
    }

    public function getNoonStart(): ?\DateTimeInterface
    {
        return $this->noonStart;
    }

    public function setNoonStart(?\DateTimeInterface $noonStart): self
    {
        $this->noonStart = $noonStart;

        return $this;
    }

    public function getNoonEnd(): ?\DateTimeInterface
    {
        return $this->noonEnd;
    }

    public function setNoonEnd(?\DateTimeInterface $noonEnd): self
    {
        $this->noonEnd = $noonEnd;

        return $this;
    }

    public function getEveningStart(): ?\DateTimeInterface
    {
        return $this->eveningStart;
    }

    public function setEveningStart(?\DateTimeInterface $eveningStart): self
    {
        $this->eveningStart = $eveningStart;

        return $this;
    }

    public function getEveningEnd(): ?\DateTimeInterface
    {
        return $this->eveningEnd;
    }

    public function setEveningEnd(?\DateTimeInterface $eveningEnd): self
    {
        $this->eveningEnd = $eveningEnd;

        return $this;
    }
}
