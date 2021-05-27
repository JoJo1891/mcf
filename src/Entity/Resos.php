<?php

namespace App\Entity;

use App\Repository\ResosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResosRepository::class)
 */
class Resos
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $liens;

    /**
     * @ORM\ManyToOne(targetEntity=Coiffeur::class, inversedBy="resos")
     */
    private $coiffeurID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLiens(): ?string
    {
        return $this->liens;
    }

    public function setLiens(string $liens): self
    {
        $this->liens = $liens;

        return $this;
    }

    public function getCoiffeurID(): ?Coiffeur
    {
        return $this->coiffeurID;
    }

    public function setCoiffeurID(?Coiffeur $coiffeurID): self
    {
        $this->coiffeurID = $coiffeurID;

        return $this;
    }
}
