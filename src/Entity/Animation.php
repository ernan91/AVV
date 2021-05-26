<?php

namespace App\Entity;

use App\Repository\AnimationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimationRepository::class)
 */
class Animation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $NomAnimation;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $LimiteAge;

    /**
     * @ORM\Column(type="float")
     */
    private $PrixAnimation;

    /**
     * @ORM\Column(type="integer")
     */
    private $NombreDePlace;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $DescriptionAnimation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $CommentaireAnimation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $DifficulteAnimation;

    /**
     * @ORM\OneToMany(targetEntity=Activite::class, mappedBy="animation")
     */
    private $activites;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;




    public function __construct()
    {
        $this->idTypeAnimation = new ArrayCollection();
        $this->activites = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAnimation(): ?string
    {
        return $this->NomAnimation;
    }

    public function setNomAnimation(string $NomAnimation): self
    {
        $this->NomAnimation = $NomAnimation;

        return $this;
    }

    public function getDateDebutAnimation(): ?\DateTimeInterface
    {
        return $this->DateDebutAnimation;
    }

    public function setDateDebutAnimation(\DateTimeInterface $DateDebutAnimation): self
    {
        $this->DateDebutAnimation = $DateDebutAnimation;

        return $this;
    }

    public function getDateFinAnimation(): ?\DateTimeInterface
    {
        return $this->DateFinAnimation;
    }

    public function setDateFinAnimation(\DateTimeInterface $DateFinAnimation): self
    {
        $this->DateFinAnimation = $DateFinAnimation;

        return $this;
    }

    public function getDureeAnimation(): ?\DateTimeInterface
    {
        return $this->DureeAnimation;
    }

    public function setDureeAnimation(\DateTimeInterface $DureeAnimation): self
    {
        $this->DureeAnimation = $DureeAnimation;

        return $this;
    }

    public function getLimiteAge(): ?int
    {
        return $this->LimiteAge;
    }

    public function setLimiteAge(?int $LimiteAge): self
    {
        $this->LimiteAge = $LimiteAge;

        return $this;
    }

    public function getPrixAnimation(): ?float
    {
        return $this->PrixAnimation;
    }

    public function setPrixAnimation(float $PrixAnimation): self
    {
        $this->PrixAnimation = $PrixAnimation;

        return $this;
    }

    public function getNombreDePlace(): ?int
    {
        return $this->NombreDePlace;
    }

    public function setNombreDePlace(int $NombreDePlace): self
    {
        $this->NombreDePlace = $NombreDePlace;

        return $this;
    }

    public function getDescriptionAnimation(): ?string
    {
        return $this->DescriptionAnimation;
    }

    public function setDescriptionAnimation(?string $DescriptionAnimation): self
    {
        $this->DescriptionAnimation = $DescriptionAnimation;

        return $this;
    }

    public function getCommentaireAnimation(): ?string
    {
        return $this->CommentaireAnimation;
    }

    public function setCommentaireAnimation(?string $CommentaireAnimation): self
    {
        $this->CommentaireAnimation = $CommentaireAnimation;

        return $this;
    }

    public function getDifficulteAnimation(): ?string
    {
        return $this->DifficulteAnimation;
    }

    public function setDifficulteAnimation(?string $DifficulteAnimation): self
    {
        $this->DifficulteAnimation = $DifficulteAnimation;

        return $this;
    }
    public function __toString()
    {
        return $this->NomAnimation;
    }
    
    /**
     * @return Collection|Activite[]
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function addActivite(Activite $activite): self
    {
        if (!$this->activites->contains($activite)) {
            $this->activites[] = $activite;
            $activite->setAnimation($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): self
    {
        if ($this->activites->contains($activite)) {
            $this->activites->removeElement($activite);
            // set the owning side to null (unless already changed)
            if ($activite->getAnimation() === $this) {
                $activite->setAnimation(null);
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
    } // ...



}