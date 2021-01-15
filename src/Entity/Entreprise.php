<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $activite;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity=stage::class, mappedBy="stagesE")
     */
    private $stagesE;

    public function __construct()
    {
        $this->stagesE = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(string $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|stage[]
     */
    public function getStagesE(): Collection
    {
        return $this->stagesE;
    }

    public function addStagesE(stage $stagesE): self
    {
        if (!$this->stagesE->contains($stagesE)) {
            $this->stagesE[] = $stagesE;
            $stagesE->setStagesE($this);
        }

        return $this;
    }

    public function removeStagesE(stage $stagesE): self
    {
        if ($this->stagesE->removeElement($stagesE)) {
            // set the owning side to null (unless already changed)
            if ($stagesE->getStagesE() === $this) {
                $stagesE->setStagesE(null);
            }
        }

        return $this;
    }
}
