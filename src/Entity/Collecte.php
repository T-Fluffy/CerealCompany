<?php

namespace App\Entity;

use App\Repository\CollecteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CollecteRepository::class)
 */
class Collecte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $DateC;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Cereale::class, inversedBy="collectes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $CodeC;

    /**
     * @ORM\ManyToOne(targetEntity=Silo::class, inversedBy="collectes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $CodeS;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateC(): ?\DateTimeInterface
    {
        return $this->DateC;
    }

    public function setDateC(\DateTimeInterface $DateC): self
    {
        $this->DateC = $DateC;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->Quantite;
    }

    public function setQuantite(int $Quantite): self
    {
        $this->Quantite = $Quantite;

        return $this;
    }

    public function getCodeC(): ?Cereale
    {
        return $this->CodeC;
    }

    public function setCodeC(?Cereale $CodeC): self
    {
        $this->CodeC = $CodeC;

        return $this;
    }

    public function getCodeS(): ?Silo
    {
        return $this->CodeS;
    }

    public function setCodeS(?Silo $CodeS): self
    {
        $this->CodeS = $CodeS;

        return $this;
    }
}
