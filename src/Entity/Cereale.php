<?php

namespace App\Entity;

use App\Repository\CerealeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CerealeRepository::class)
 */
class Cereale
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomC;

    /**
     * @ORM\Column(type="integer")
     */
    private $Prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $CodeC;

    /**
     * @ORM\OneToMany(targetEntity=Collecte::class, mappedBy="CodeC")
     */
    private $collectes;

    public function __construct()
    {
        $this->collectes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomC(): ?string
    {
        return $this->NomC;
    }

    public function setNomC(string $NomC): self
    {
        $this->NomC = $NomC;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getCodeC(): ?int
    {
        return $this->CodeC;
    }

    public function setCodeC(int $CodeC): self
    {
        $this->CodeC = $CodeC;

        return $this;
    }

    /**
     * @return Collection|Collecte[]
     */
    public function getCollectes(): Collection
    {
        return $this->collectes;
    }

    public function addCollecte(Collecte $collecte): self
    {
        if (!$this->collectes->contains($collecte)) {
            $this->collectes[] = $collecte;
            $collecte->setCodeC($this);
        }

        return $this;
    }

    public function removeCollecte(Collecte $collecte): self
    {
        if ($this->collectes->removeElement($collecte)) {
            // set the owning side to null (unless already changed)
            if ($collecte->getCodeC() === $this) {
                $collecte->setCodeC(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->NomC;
    }
}
