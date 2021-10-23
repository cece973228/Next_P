<?php

namespace App\Entity;

use App\Repository\PlateformeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlateformeRepository::class)
 */
class Plateforme
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_plateforme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPlateforme(): ?string
    {
        return $this->nom_plateforme;
    }

    public function setNomPlateforme(?string $nom_plateforme): self
    {
        $this->nom_plateforme = $nom_plateforme;

        return $this;
    }
}
