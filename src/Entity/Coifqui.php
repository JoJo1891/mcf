<?php

namespace App\Entity;

use App\Repository\CoifquiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoifquiRepository::class)
 */
class Coifqui
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Coiffeur::class, inversedBy="coifquis")
     */
    private $coiffeurID;

    /**
     * @ORM\ManyToMany(targetEntity=Quicoiffe::class, inversedBy="coifquis")
     */
    private $quiID;

    public function __construct()
    {
        $this->coiffeurID = new ArrayCollection();
        $this->quiID = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Coiffeur[]
     */
    public function getCoiffeurID(): Collection
    {
        return $this->coiffeurID;
    }

    public function addCoiffeurID(Coiffeur $coiffeurID): self
    {
        if (!$this->coiffeurID->contains($coiffeurID)) {
            $this->coiffeurID[] = $coiffeurID;
        }

        return $this;
    }

    public function removeCoiffeurID(Coiffeur $coiffeurID): self
    {
        $this->coiffeurID->removeElement($coiffeurID);

        return $this;
    }

    /**
     * @return Collection|Quicoiffe[]
     */
    public function getQuiID(): Collection
    {
        return $this->quiID;
    }

    public function addQuiID(Quicoiffe $quiID): self
    {
        if (!$this->quiID->contains($quiID)) {
            $this->quiID[] = $quiID;
        }

        return $this;
    }

    public function removeQuiID(Quicoiffe $quiID): self
    {
        $this->quiID->removeElement($quiID);

        return $this;
    }
}
