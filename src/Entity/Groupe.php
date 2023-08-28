<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupeRepository::class)]
class Groupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;


    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'groupes')]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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


    
    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    // public function addUser(User $users): static
    // {
    //     if (!$this->users->contains($users)) {
    //         $this->users->add($users);
    //     }

    //     return $this;
    // }

    // public function removeUser(User $user): static
    // {
    //     $this->user->removeElement($user);

    //     return $this;
    // }
}
