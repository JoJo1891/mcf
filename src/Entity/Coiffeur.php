<?php

namespace App\Entity;

use App\Repository\CoiffeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoiffeurRepository::class)
 */
class Coiffeur
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
    private $pseudo;

    /**
     * @ORM\Column(type="integer")
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $certifpro;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $certifqua;

    /**
     * @ORM\OneToMany(targetEntity=Resos::class, mappedBy="coiffeurID")
     */
    private $resos;

    /**
     * @ORM\ManyToMany(targetEntity=Coifqui::class, mappedBy="coiffeurID")
     */
    private $coifquis;

    public function __construct()
    {
        $this->resos = new ArrayCollection();
        $this->coiffeurStyles = new ArrayCollection();
        $this->coifquis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCertifpro(): ?int
    {
        return $this->certifpro;
    }

    public function setCertifpro(?int $certifpro): self
    {
        $this->certifpro = $certifpro;

        return $this;
    }

    public function getCertifqua(): ?int
    {
        return $this->certifqua;
    }

    public function setCertifqua(?int $certifqua): self
    {
        $this->certifqua = $certifqua;

        return $this;
    }

    /**
     * @return Collection|Resos[]
     */
    public function getResos(): Collection
    {
        return $this->resos;
    }

    public function addReso(Resos $reso): self
    {
        if (!$this->resos->contains($reso)) {
            $this->resos[] = $reso;
            $reso->setCoiffeurID($this);
        }

        return $this;
    }

    public function removeReso(Resos $reso): self
    {
        if ($this->resos->removeElement($reso)) {
            // set the owning side to null (unless already changed)
            if ($reso->getCoiffeurID() === $this) {
                $reso->setCoiffeurID(null);
            }
        }

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
            $coiffeurStyle->addCoiffeurID($this);
        }

        return $this;
    }

    public function removeCoiffeurStyle(CoiffeurStyle $coiffeurStyle): self
    {
        if ($this->coiffeurStyles->removeElement($coiffeurStyle)) {
            $coiffeurStyle->removeCoiffeurID($this);
        }

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
            $coifqui->addCoiffeurID($this);
        }

        return $this;
    }

    public function removeCoifqui(Coifqui $coifqui): self
    {
        if ($this->coifquis->removeElement($coifqui)) {
            $coifqui->removeCoiffeurID($this);
        }

        return $this;
    }
}
