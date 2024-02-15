<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CandidatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;

#[ORM\Entity(repositoryClass: CandidatsRepository::class)]
#[ApiResource (
    operations: [
        new Get(uriTemplate:"/candidat/{id}"),
        new GetCollection(uriTemplate:"/candidats")
        ])
    ]
class Candidats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomCandidat = null;

    #[ORM\Column(length: 50)]
    private ?string $prenomCandidat = null;

    #[ORM\Column(length: 255)]
    private ?string $sloganCandidat = null;

    #[ORM\OneToMany(targetEntity: SessionCandidats::class, mappedBy: 'candidat', orphanRemoval: true)]
    private Collection $sessionCandidats;

  

    public function __construct()
    {
        $this->sessionCandidats = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCandidat(): ?string
    {
        return $this->nomCandidat;
    }

    public function setNomCandidat(string $nomCandidat): static
    {
        $this->nomCandidat = $nomCandidat;

        return $this;
    }

    public function getPrenomCandidat(): ?string
    {
        return $this->prenomCandidat;
    }

    public function setPrenomCandidat(string $prenomCandidat): static
    {
        $this->prenomCandidat = $prenomCandidat;

        return $this;
    }

    public function getSloganCandidat(): ?string
    {
        return $this->sloganCandidat;
    }

    public function setSloganCandidat(string $sloganCandidat): static
    {
        $this->sloganCandidat = $sloganCandidat;

        return $this;
    }

    /**
     * @return Collection<int, SessionCandidats>
     */
    public function getSessionCandidats(): Collection
    {
        return $this->sessionCandidats;
    }

    public function addSessionCandidat(SessionCandidats $sessionCandidat): static
    {
        if (!$this->sessionCandidats->contains($sessionCandidat)) {
            $this->sessionCandidats->add($sessionCandidat);
            $sessionCandidat->setCandidat($this);
        }

        return $this;
    }

    public function removeSessionCandidat(SessionCandidats $sessionCandidat): static
    {
        if ($this->sessionCandidats->removeElement($sessionCandidat)) {
            // set the owning side to null (unless already changed)
            if ($sessionCandidat->getCandidat() === $this) {
                $sessionCandidat->setCandidat(null);
            }
        }

        return $this;
    }



}
