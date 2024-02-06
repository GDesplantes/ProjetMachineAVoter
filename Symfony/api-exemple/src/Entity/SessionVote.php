<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SessionVoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionVoteRepository::class)]
#[ApiResource]
class SessionVote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idSession = null;

    #[ORM\Column(length: 25)]
    private ?string $statusSession = null;

    #[ORM\Column]
    private ?int $nbTour = null;

    #[ORM\ManyToOne(inversedBy: 'sessionVotes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidat $idSessionVote = null;

    public function getId(): ?int
    {
        return $this->idSession;
    }

    public function getStatusSession(): ?string
    {
        return $this->statusSession;
    }

    public function setStatusSession(string $statusSession): static
    {
        $this->statusSession = $statusSession;

        return $this;
    }

    public function getNbTour(): ?int
    {
        return $this->nbTour;
    }

    public function setNbTour(int $nbTour): static
    {
        $this->nbTour = $nbTour;

        return $this;
    }

    public function getIdSessionVote(): ?Candidat
    {
        return $this->idSessionVote;
    }

    public function setIdSessionVote(?Candidat $idSessionVote): static
    {
        $this->idSessionVote = $idSessionVote;

        return $this;
    }
}
