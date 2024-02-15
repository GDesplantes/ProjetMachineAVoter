<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VotesRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;

#[ORM\Entity(repositoryClass: VotesRepository::class)]
#[ApiResource (
    operations: [
        new Post(uriTemplate:"/vote"),
        new GetCollection()
        ])
]
class Votes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $tour = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?SessionVote $session = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidats $candidat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTour(): ?int
    {
        return $this->tour;
    }

    public function setTour(int $tour): static
    {
        $this->tour = $tour;

        return $this;
    }

    public function getSession(): ?SessionVote
    {
        return $this->session;
    }

    public function setSession(?SessionVote $session): static
    {
        $this->session = $session;

        return $this;
    }

    public function getCandidat(): ?Candidats
    {
        return $this->candidat;
    }

    public function setCandidat(?Candidats $candidat): static
    {
        $this->candidat = $candidat;

        return $this;
    }
}
