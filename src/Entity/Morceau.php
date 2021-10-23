<?php

namespace App\Entity;

use App\Repository\MorceauRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MorceauRepository::class)
 */
class Morceau
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
    private $nom_morceau;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree_morceau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMorceau(): ?string
    {
        return $this->nom_morceau;
    }

    public function setNomMorceau(string $nom_morceau): self
    {
        $this->nom_morceau = $nom_morceau;

        return $this;
    }

    public function getDureeMorceau(): ?int
    {
        return $this->duree_morceau;
    }

    public function setDureeMorceau(int $duree_morceau): self
    {
        $this->duree_morceau = $duree_morceau;

        return $this;
    }
}
