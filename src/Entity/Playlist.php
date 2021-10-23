<?php

namespace App\Entity;

use App\Repository\PlaylistRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlaylistRepository::class)
 */
class Playlist
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
    private $nom_playlist;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $artiste_playlist;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $duree_playlist;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPlaylist(): ?string
    {
        return $this->nom_playlist;
    }

    public function setNomPlaylist(?string $nom_playlist): self
    {
        $this->nom_playlist = $nom_playlist;

        return $this;
    }

    public function getArtistePlaylist(): ?string
    {
        return $this->artiste_playlist;
    }

    public function setArtistePlaylist(?string $artiste_playlist): self
    {
        $this->artiste_playlist = $artiste_playlist;

        return $this;
    }

    public function getDureePlaylist(): ?string
    {
        return $this->duree_playlist;
    }

    public function setDureePlaylist(?string $duree_playlist): self
    {
        $this->duree_playlist = $duree_playlist;

        return $this;
    }
}
