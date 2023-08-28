<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $uuid = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateNaissance = null;

    #[ORM\Column(nullable: true)]
    private ?int $sexe = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $urgNom = null;

    #[ORM\Column(length: 255)]
    private ?string $urgPrenom = null;

    #[ORM\Column(length: 255)]
    private ?string $urgNumero = null;

    #[ORM\Column]
    private ?bool $certifMedical = null;

    #[ORM\Column]
    private ?bool $licencePaid = null;

    #[ORM\Column]
    private ?bool $coursPaid = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'user')]
    private ?Ceinture $ceinture = null;

    #[ORM\ManyToMany(targetEntity: Groupe::class, mappedBy: 'user')]
    private Collection $groupes;

    public function __construct()
    {
        $this->groupes = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): static
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
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

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }



    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeImmutable
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeImmutable $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getSexe(): ?int
    {
        return $this->sexe;
    }

    public function setSexe(?int $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getUrgNom(): ?string
    {
        return $this->urgNom;
    }

    public function setUrgNom(string $urgNom): static
    {
        $this->urgNom = $urgNom;

        return $this;
    }

    public function getUrgPrenom(): ?string
    {
        return $this->urgPrenom;
    }

    public function setUrgPrenom(string $urgPrenom): static
    {
        $this->urgPrenom = $urgPrenom;

        return $this;
    }

    public function getUrgNumero(): ?string
    {
        return $this->urgNumero;
    }

    public function setUrgNumero(string $urgNumero): static
    {
        $this->urgNumero = $urgNumero;

        return $this;
    }

    public function isCertifMedical(): ?bool
    {
        return $this->certifMedical;
    }

    public function setCertifMedical(bool $certifMedical): static
    {
        $this->certifMedical = $certifMedical;

        return $this;
    }

    public function isLicencePaid(): ?bool
    {
        return $this->licencePaid;
    }

    public function setLicencePaid(bool $licencePaid): static
    {
        $this->licencePaid = $licencePaid;

        return $this;
    }

    public function isCoursPaid(): ?bool
    {
        return $this->coursPaid;
    }

    public function setCoursPaid(bool $coursPaid): static
    {
        $this->coursPaid = $coursPaid;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCeinture(): ?Ceinture
    {
        return $this->ceinture;
    }

    public function setCeinture(?Ceinture $ceinture): static
    {
        $this->ceinture = $ceinture;

        return $this;
    }

    /**
     * @return Collection<int, Groupe>
     */
    public function getGroupes(): Collection
    {
        return $this->groupes;
    }

    public function addGroupe(Groupe $groupe): static
    {
        if (!$this->groupes->contains($groupe)) {
            $this->groupes->add($groupe);
            $groupe->addUser($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): static
    {
        if ($this->groupes->removeElement($groupe)) {
            $groupe->removeUser($this);
        }

        return $this;
    }
}
