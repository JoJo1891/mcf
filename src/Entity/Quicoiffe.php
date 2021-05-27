<?php

namespace App\Entity;

use App\Repository\QuicoiffeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuicoiffeRepository::class)
 */
class Quicoiffe
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
    private $qui;

    /**
     * @ORM\ManyToMany(targetEntity=Coifqui::class, mappedBy="quiID")
     */
    private $coifquis;

    public function __construct()
    {
        $this->coifquis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQui(): ?string
    {
        return $this->qui;
    }

    public function setQui(string $qui): self
    {
        $this->qui = $qui;

        return $this;
    }

    /**
     * @return Collection|Coifqui[]
     */
    public function getCoifquis(): Collection
    {
        return $this->coifquis;
    }

    public function addCoifqui(Coifqui $coifqui): self
    {
        if (!$this->coifquis->contains($coifqui)) {
            $this->coifquis[] = $coifqui;
            $coifqui->addQuiID($this);
        }

        return $this;
    }

    public function removeCoifqui(Coifqui $coifqui): self
    {
        if ($this->coifquis->removeElement($coifqui)) {
            $coifqui->removeQuiID($this);
        }

        return $this;
    }
}
