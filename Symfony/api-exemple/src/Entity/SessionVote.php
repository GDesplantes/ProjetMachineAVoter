<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SessionVoteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;

#[ORM\Entity(repositoryClass: SessionVoteRepository::class)]
#[ApiResource  (
    operations: [
        new Get(),
        new GetCollection()
        ])
]
class SessionVote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nb_tour = null;

    #[ORM\Column]
    private ?int $nbRepresentants = null;

    #[ORM\Column(length: 10)]
    private ?string $status = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbTour(): ?int
    {
        return $this->nb_tour;
    }

    public function setNbTour(int $nb_tour): static
    {
        $this->nb_tour = $nb_tour;

        return $this;
    }

    public function getNbRepresentants(): ?int
    {
        return $this->nbRepresentants;
    }

    public function setNbRepresentants(int $nbRepresentants): static
    {
        $this->nbRepresentants = $nbRepresentants;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }





}
