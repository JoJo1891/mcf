<?php

namespace App\Entity;

use App\Repository\StyleCoiffeurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StyleCoiffeurRepository::class)
 */
class StyleCoiffeur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idCoiffeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $idStyle;

    /**
     * @ORM\Column(type="integer")
     */
    private $etat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCoiffeur(): ?int
    {
        return $this->idCoiffeur;
    }

    public function setIdCoiffeur(int $idCoiffeur): self
    {
        $this->idCoiffeur = $idCoiffeur;

        return $this;
    }

    public function getIdStyle(): ?int
    {
        return $this->idStyle;
    }

    public function setIdStyle(int $idStyle): self
    {
        $this->idStyle = $idStyle;

        return $this;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}
