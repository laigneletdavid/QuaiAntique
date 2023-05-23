<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_name = null;

    #[ORM\Column(length: 10)]
    private ?string $customer_phone = null;

    #[ORM\Column]
    private ?int $nbr_reservation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $allergy = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $reserved_at = null;

    #[ORM\Column()]
    #[Assert\NotBlank]
    private ?string $reserved_time = null;

    #[ORM\Column]
    private ?bool $validated = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $period = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerName(): ?string
    {
        return $this->customer_name;
    }

    public function setCustomerName(string $customer_name): self
    {
        $this->customer_name = $customer_name;

        return $this;
    }

    public function getCustomerPhone(): ?string
    {
        return $this->customer_phone;
    }

    public function setCustomerPhone(string $customer_phone): self
    {
        $this->customer_phone = $customer_phone;

        return $this;
    }

    public function getNbrReservation(): ?int
    {
        return $this->nbr_reservation;
    }

    public function setNbrReservation(int $nbr_reservation): self
    {
        $this->nbr_reservation = $nbr_reservation;

        return $this;
    }

    public function getAllergy(): ?string
    {
        return $this->allergy;
    }

    public function setAllergy(string $allergy): self
    {
        $this->allergy = $allergy;

        return $this;
    }

    public function getReservedAt(): ?\DateTimeInterface
    {
        return $this->reserved_at;
    }

    public function setReservedAt(\DateTimeInterface $reserved_at): self
    {
        $this->reserved_at = $reserved_at;

        return $this;
    }

    public function getReservedTime(): ?string
    {
        return $this->reserved_time;
    }

    public function setReservedTime(string $reserved_time): self
    {
        $this->reserved_time = $reserved_time;

        return $this;
    }

    public function isValidated(): ?bool
    {
        return $this->validated;
    }

    public function setValidated(bool $validated): self
    {
        $this->validated = $validated;

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

}
