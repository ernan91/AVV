<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActiviteRepository::class)
 */
class Activite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $HeureRdv;

    /**
     * @ORM\Column(type="datetime")
     */
    private $HeureDebutActivite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateFinActivite;

    /**
     * @ORM\Column(type="float")
     */
    private $PrixActivite;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $NomResponsable;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $PrenomResponsable;

    /**
     * @ORM\ManyToOne(targetEntity=TypeActivite::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idTypeActivite;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $NomActivite;

    /**
     * @ORM\ManyToOne(targetEntity=Animation::class, inversedBy="activites")
     */
    private $animation;

    /**
     * @ORM\OneToMany(targetEntity=Inscription::class, mappedBy="activite")
     */
    private $inscriptions;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $DescriptionActivite;

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureRdv(): ?\DateTimeInterface
    {
        return $this->HeureRdv;
    }

    public function setHeureRdv(\DateTimeInterface $HeureRdv): self
    {
        $this->HeureRdv = $HeureRdv;

        return $this;
    }

    public function getHeureDebutActivite(): ?\DateTimeInterface
    {
        return $this->HeureDebutActivite;
    }

    public function setHeureDebutActivite(\DateTimeInterface $HeureDebutActivite): self
    {
        $this->HeureDebutActivite = $HeureDebutActivite;

        return $this;
    }

    public function getDateFinActivite(): ?\DateTimeInterface
    {
        return $this->DateFinActivite;
    }

    public function setDateFinActivite(\DateTimeInterface $DateFinActivite): self
    {
        $this->DateFinActivite = $DateFinActivite;

        return $this;
    }

    public function getPrixActivite(): ?float
    {
        return $this->PrixActivite;
    }

    public function setPrixActivite(float $PrixActivite): self
    {
        $this->PrixActivite = $PrixActivite;

        return $this;
    }

    public function getNomResponsable(): ?string
    {
        return $this->NomResponsable;
    }

    public function setNomResponsable(string $NomResponsable): self
    {
        $this->NomResponsable = $NomResponsable;

        return $this;
    }

    public function getPrenomResponsable(): ?string
    {
        return $this->PrenomResponsable;
    }

    public function setPrenomResponsable(string $PrenomResponsable): self
    {
        $this->PrenomResponsable = $PrenomResponsable;

        return $this;
    }

    public function getIdTypeActivite(): ?TypeActivite
    {
        return $this->idTypeActivite;
    }

    public function setIdTypeActivite(?TypeActivite $idTypeActivite): self
    {
        $this->idTypeActivite = $idTypeActivite;

        return $this;
    }

    public function getNomActivite(): ?string
    {
        return $this->NomActivite;
    }

    public function setNomActivite(string $NomActivite): self
    {
        $this->NomActivite = $NomActivite;

        return $this;
    }

    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    public function setAnimation(?Animation $animation): self
    {
        $this->animation = $animation;

        return $this;
    }

    /**
     * @return Collection|Inscription[]
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions[] = $inscription;
            $inscription->setActivite($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->contains($inscription)) {
            $this->inscriptions->removeElement($inscription);
            // set the owning side to null (unless already changed)
            if ($inscription->getActivite() === $this) {
                $inscription->setActivite(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
    public function __toString()
    {
        return $this->NomActivite;
    }

    public function getDescriptionActivite(): ?string
    {
        return $this->DescriptionActivite;
    }

    public function setDescriptionActivite(?string $DescriptionActivite): self
    {
        $this->DescriptionActivite = $DescriptionActivite;

        return $this;
    }

   
}
