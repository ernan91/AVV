<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscriptionRepository::class)
 */
class Inscription
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
    private $dateInscrip;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAnnule;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="inscriptions")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Activite::class, inversedBy="inscriptions")
     */
    private $activite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateInscrip(): ?\DateTimeInterface
    {
        return $this->dateInscrip;
    }

    public function setDateInscrip(\DateTimeInterface $dateInscrip): self
    {
        $this->dateInscrip = $dateInscrip;

        return $this;
    }

    public function getDateAnnule(): ?\DateTimeInterface
    {
        return $this->dateAnnule;
    }

    public function setDateAnnule(\DateTimeInterface $dateAnnule): self
    {
        $this->dateAnnule = $dateAnnule;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getActivite(): ?Activite
    {
        return $this->activite;
    }

    public function setActivite(?Activite $activite): self
    {
        $this->activite = $activite;

        return $this;
    }
    public function __toString()
    {
        return $this->user;
    }
}
