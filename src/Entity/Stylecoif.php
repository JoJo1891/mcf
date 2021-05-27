<?php

namespace App\Entity;

use App\Repository\StylecoifRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StylecoifRepository::class)
 */
class Stylecoif
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

    public function __construct()
    {
        $this->coiffeurStyles = new ArrayCollection();
    }

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

    /**
     * @return Collection|CoiffeurStyle[]
     */
    public function getCoiffeurStyles(): Collection
    {
        return $this->coiffeurStyles;
    }

    public function addCoiffeurStyle(CoiffeurStyle $coiffeurStyle): self
    {
        if (!$this->coiffeurStyles->contains($coiffeurStyle)) {
            $this->coiffeurStyles[] = $coiffeurStyle;
            $coiffeurStyle->addStyleID($this);
        }

        return $this;
    }

    public function removeCoiffeurStyle(CoiffeurStyle $coiffeurStyle): self
    {
        if ($this->coiffeurStyles->removeElement($coiffeurStyle)) {
            $coiffeurStyle->removeStyleID($this);
        }

        return $this;
    }
}
