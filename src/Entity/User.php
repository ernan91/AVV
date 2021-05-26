<?php

namespace App\Entity;


use App\Repository\UserRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $NomCompte;

    /**
     * @ORM\Column(type="text", length=50)
     */
    private $Username;

    /**
     * @ORM\Column(type="date")
     */
    private $DateInscription;

    /**
     * @ORM\Column(type="date")
     */
    private $DateFerme;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [] ;

    /**
     * @ORM\Column(type="date")
     */
    private $DateDebSejour;

    /**
     * @ORM\Column(type="date")
     */
    private $DateFinSejour;

    /**
     * @ORM\Column(type="date")
     */
    private $DateNaissCompte;

   /**
     * @ORM\Column(type="string", length=75)
     */
    private $email;
    /**
     * @ORM\Column(type="text")
     */
    private $NumTelCompte;

    /**
     * @ORM\OneToMany(targetEntity=Inscription::class, mappedBy="user")
     */
    private $inscriptions;

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

   /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    public function getNomCompte(): ?string
    {
        return $this->NomCompte;
    }

    public function setNomCompte(string $NomCompte): self
    {
        $this->NomCompte = $NomCompte;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this-> Username = $Username;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->DateInscription;
    }

    public function setDateInscription(\DateTimeInterface $DateInscription): self
    {
        $this->DateInscription = $DateInscription;

        return $this;
    }

    public function getDateFerme(): ?\DateTimeInterface
    {
        return $this->DateFerme;
    }

    public function setDateFerme(\DateTimeInterface $DateFerme): self
    {
        $this->DateFerme = $DateFerme;

        return $this;
    }
     /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }
       /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

  /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getDateDebSejour(): ?\DateTimeInterface
    {
        return $this->DateDebSejour;
    }

    public function setDateDebSejour(\DateTimeInterface $DateDebSejour): self
    {
        $this->DateDebSejour = $DateDebSejour;

        return $this;
    }

    public function getDateFinSejour(): ?\DateTimeInterface
    {
        return $this->DateFinSejour;
    }

    public function setDateFinSejour(\DateTimeInterface $DateFinSejour): self
    {
        $this->DateFinSejour = $DateFinSejour;

        return $this;
    }

    public function getDateNaissCompte(): ?DateTime
    {
        return $this->DateNaissCompte;
    }

    public function setDateNaissCompte(DateTime $DateNaissCompte): self
    {
        $this->DateNaissCompte = $DateNaissCompte;

        return $this;
    }

    public function getemail(): ?string
    {
        return $this->email;
    }

    public function setemail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumTelCompte(): ?string
    {
        return $this->NumTelCompte;
    }

    public function setNumTelCompte(string $NumTelCompte): self
    {
        $this->NumTelCompte = $NumTelCompte;

        return $this;
    }
    public function __toString()
    {
        return $this->NomCompte;
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
            $inscription->setUser($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->contains($inscription)) {
            $this->inscriptions->removeElement($inscription);
            // set the owning side to null (unless already changed)
            if ($inscription->getUser() === $this) {
                $inscription->setUser(null);
            }
        }

        return $this;
    }

    
}
