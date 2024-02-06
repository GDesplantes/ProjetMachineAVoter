<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CandidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatRepository::class)]
#[ApiResource]
class Candidat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomCandidat = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomCandidat = null;

    #[ORM\Column(length: 255)]
    private ?string $sloganCandidat = null;

    #[ORM\Column]
    private ?int $idCandidat = null;

    #[ORM\OneToMany(targetEntity: SessionVote::class, mappedBy: 'idSessionVote')]
    private Collection $sessionVotes;

    public function __construct()
    {
        $this->sessionVotes = new ArrayCollection();
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

    public function getIdCandidat(): ?int
    {
        return $this->idCandidat;
    }

    public function setIdCandidat(int $idCandidat): static
    {
        $this->idCandidat = $idCandidat;

        return $this;
    }

    /**
     * @return Collection<int, SessionVote>
     */
    public function getSessionVotes(): Collection
    {
        return $this->sessionVotes;
    }

    public function addSessionVote(SessionVote $sessionVote): static
    {
        if (!$this->sessionVotes->contains($sessionVote)) {
            $this->sessionVotes->add($sessionVote);
            $sessionVote->setIdSessionVote($this);
        }

        return $this;
    }

    public function removeSessionVote(SessionVote $sessionVote): static
    {
        if ($this->sessionVotes->removeElement($sessionVote)) {
            // set the owning side to null (unless already changed)
            if ($sessionVote->getIdSessionVote() === $this) {
                $sessionVote->setIdSessionVote(null);
            }
        }

        return $this;
    }
}
