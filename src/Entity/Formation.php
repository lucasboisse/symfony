<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Description;

    /**
     * @ORM\ManyToMany(targetEntity=stage::class, inversedBy="stagesF")
     */
    private $stagesF;

    public function __construct()
    {
        $this->stagesF = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection|stage[]
     */
    public function getStagesF(): Collection
    {
        return $this->stagesF;
    }

    public function addStagesF(stage $stagesF): self
    {
        if (!$this->stagesF->contains($stagesF)) {
            $this->stagesF[] = $stagesF;
        }

        return $this;
    }

    public function removeStagesF(stage $stagesF): self
    {
        $this->stagesF->removeElement($stagesF);

        return $this;
    }
}
