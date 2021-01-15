<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
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
    private $Intitule;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Mission;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $AdresseMail;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="stagesE")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stagesE;

    /**
     * @ORM\ManyToMany(targetEntity=Formation::class, mappedBy="stagesF")
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

    public function getIntitule(): ?string
    {
        return $this->Intitule;
    }

    public function setIntitule(string $Intitule): self
    {
        $this->Intitule = $Intitule;

        return $this;
    }

    public function getMission(): ?string
    {
        return $this->Mission;
    }

    public function setMission(string $Mission): self
    {
        $this->Mission = $Mission;

        return $this;
    }

    public function getAdresseMail(): ?string
    {
        return $this->AdresseMail;
    }

    public function setAdresseMail(string $AdresseMail): self
    {
        $this->AdresseMail = $AdresseMail;

        return $this;
    }

    public function getStagesE(): ?Entreprise
    {
        return $this->stagesE;
    }

    public function setStagesE(?Entreprise $stagesE): self
    {
        $this->stagesE = $stagesE;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getStagesF(): Collection
    {
        return $this->stagesF;
    }

    public function addStagesF(Formation $stagesF): self
    {
        if (!$this->stagesF->contains($stagesF)) {
            $this->stagesF[] = $stagesF;
            $stagesF->addStagesF($this);
        }

        return $this;
    }

    public function removeStagesF(Formation $stagesF): self
    {
        if ($this->stagesF->removeElement($stagesF)) {
            $stagesF->removeStagesF($this);
        }

        return $this;
    }
}
