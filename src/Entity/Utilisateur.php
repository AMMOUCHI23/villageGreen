<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 180)]
    #[Assert\NotBlank (message: "le champ email ne peut pas etre vide")]
    #[Assert\Email(message: 'l\'email {{ value }} n\'est pas valide',
    )]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Assert\NotBlank (message: "le champ mot de passe ne peut pas etre vide")]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank (message: "le champ nom ne peut pas etre vide")]
    #[Assert\Length(
        min: 3,
        max: 50,
        minMessage: 'votre nom doit avoir minimum {{ limit }} caractères',
        maxMessage: 'votre nom ne doit pas dépassé {{ limit }} caractères',
    )]

    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank (message: "le champ prénom ne peut pas etre vide")]
    #[Assert\Length(
        min: 3,
        max: 50,
        minMessage: 'votre prénom doit avoir minimum {{ limit }} caractères',
        maxMessage: 'votre prénom ne doit pas dépassé {{ limit }} caractères',
    )]
    private ?string $prenom = null;


    #[ORM\OneToOne(mappedBy: 'utilisateur', cascade: ['persist', 'remove'])]
    private ?Client $client = null;

    #[ORM\OneToOne(mappedBy: 'Utilisateur', cascade: ['persist', 'remove'])]
    private ?Employe $employe = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(length: 10, nullable: true)]
    #[Assert\NotBlank (message: "le champ téléphone ne peut pas etre vide")]
    #[Assert\Regex('/^0[1-9]/', message:'le numéro de téléphone doit commencer avec 0 ')]
    #[Assert\Length(
        min: 10,
        max: 10,
        exactMessage: 'votre numéro de téléphone doit avoir éxactement {{ limit }} chiffres',
        
    )]
    private ?string $telephone = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\Column(length: 255)]
    private ?string $sexe = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank (message: "le champ adresse ne peut pas etre vide")]
    private ?string $adresse = null;

    #[ORM\Column(length: 5, nullable: true)]
    #[Assert\NotBlank (message: "le champ code postale ne peut pas etre vide")]
    #[Assert\Regex('/^[1-9]/', message:'le code postal doit avoir 5 chiffres ')]
    #[Assert\Length(
        min: 5,
        max: 5,
        exactMessage: 'votre code postal doit avoir éxactement {{ limit }} chiffres',
        
    )]
    private ?string $CP = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank (message: "le champ ville ne peut pas etre vide")]
    private ?string $ville = null;


    public function getId(): ?int
    {
        return $this->id;
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
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_CLIENT';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(Client $client): static
    {
        // set the owning side of the relation if necessary
        if ($client->getUtilisateur() !== $this) {
            $client->setUtilisateur($this);
        }

        $this->client = $client;

        return $this;
    }

    public function getEmploye(): ?Employe
    {
        return $this->employe;
    }

    public function setEmploye(Employe $employe): static
    {
        // set the owning side of the relation if necessary
        if ($employe->getUtilisateur() !== $this) {
            $employe->setUtilisateur($this);
        }

        $this->employe = $employe;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function __toString()
    {
        return $this->nom . " " . $this->prenom;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCP(): ?string
    {
        return $this->CP;
    }

    public function setCP(?string $CP): static
    {
        $this->CP = $CP;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }
}
