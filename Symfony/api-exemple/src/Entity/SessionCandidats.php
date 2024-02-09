<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SessionCandidatsRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Get;

#[ORM\Entity(repositoryClass: SessionCandidatsRepository::class)]
#[ApiResource (
    operations: [
        new Get(),
        new GetCollection()
        ])
        ]
class SessionCandidats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'sessionCandidats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidats $candidat = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?SessionVote $session = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSession(): ?SessionVote
    {
        return $this->session;
    }

    public function setSession(?SessionVote $session): static
    {
        $this->session = $session;

        return $this;
    }
}
