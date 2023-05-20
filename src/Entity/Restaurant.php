<?php

namespace App\Entity;

use App\Repository\RestorantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestorantRepository::class)]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbr_place = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $town = null;

    #[ORM\Column(nullable: true)]
    private ?int $post_code = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adress_1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adress_2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $google_maps = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbrPlace(): ?int
    {
        return $this->nbr_place;
    }

    public function setNbrPlace(int $nbr_place): self
    {
        $this->nbr_place = $nbr_place;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(?string $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getPostCode(): ?int
    {
        return $this->post_code;
    }

    public function setPostCode(?int $post_code): self
    {
        $this->post_code = $post_code;

        return $this;
    }

    public function getAdress1(): ?string
    {
        return $this->adress_1;
    }

    public function setAdress1(?string $adress_1): self
    {
        $this->adress_1 = $adress_1;

        return $this;
    }

    public function getAdress2(): ?string
    {
        return $this->adress_2;
    }

    public function setAdress2(?string $adress_2): self
    {
        $this->adress_2 = $adress_2;

        return $this;
    }

    public function getGoogleMaps(): ?string
    {
        return $this->google_maps;
    }

    public function setGoogleMaps(?string $google_maps): self
    {
        $this->google_maps = $google_maps;

        return $this;
    }
}
