<?php

namespace App\Entity;

use App\Repository\RelevesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelevesRepository::class)]
class Releves
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 17)]
    private ?string $relevebrut = null;

    #[ORM\ManyToOne(targetEntity: Lieux::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Lieux $lieu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getRelevebrut(): ?string
    {
        return $this->relevebrut;
    }

    public function setRelevebrut(string $relevebrut): static
    {
        $this->relevebrut = $relevebrut;

        return $this;
    }

    public function getLieu(): ?Lieux
    {
        return $this->lieu;
    }

    public function setLieu(?Lieux $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getTableau(): array
    {
        return explode('/', $this->relevebrut);
    }
}
