<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $numero_facture = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_facture = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_commande = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2)]
    private ?string $total_commande = null;

    #[ORM\Column(length: 70)]
    #[Assert\NotBlank (message: "le champ adresse ne peut pas etre vide")]
    private ?string $adresse_livraison = null;

    #[ORM\Column(length: 5)]
    #[Assert\NotBlank (message: "le champ code postale ne peut pas etre vide")]
    #[Assert\Regex('/^[1-9]/', message:'le code postal doit avoir 5 chiffres ')]
    #[Assert\Length(
        min: 5,
        max: 5,
        exactMessage: 'votre code postal doit avoir éxactement {{ limit }} chiffres',
        
    )]
    private ?string $cp_livraison = null;
    
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank (message: "le champ ville ne peut pas etre vide")]
    private ?string $ville_livraison = null;

    #[ORM\Column(length: 70)]
    #[Assert\NotBlank (message: "le champ adresse ne peut pas etre vide")]
    private ?string $adresse_facturation = null;

    #[ORM\Column(length: 5)]
    #[Assert\NotBlank (message: "le champ code postale ne peut pas etre vide")]
    #[Assert\Regex('/^[1-9]/', message:'le code postal doit avoir 5 chiffres ')]
    #[Assert\Length(
        min: 5,
        max: 5,
        exactMessage: 'votre code postal doit avoir éxactement {{ limit }} chiffres',
        
    )]
    private ?string $cp_facturation = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank (message: "le champ ville ne peut pas etre vide")]
    private ?string $ville_facturation = null;

    #[ORM\Column(length: 30)]
    private ?string $statut = null;

    #[ORM\Column]
    private ?bool $payee = null;

    #[ORM\Column(length: 30)]
    private ?string $mode_paiement = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2)]
    private ?string $total_paye = null;

    #[ORM\OneToMany(targetEntity: LigneCommande::class, mappedBy: 'Commande')]
    private Collection $ligneCommandes;

    #[ORM\OneToMany(targetEntity: Livraison::class, mappedBy: 'Commande')]
    private Collection $livraisons;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $Client = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    public function __construct()
    {
        $this->ligneCommandes = new ArrayCollection();
        $this->livraisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroFacture(): ?int
    {
        return $this->numero_facture;
    }

    public function setNumeroFacture(?int $numero_facture): static
    {
        $this->numero_facture = $numero_facture;

        return $this;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->date_facture;
    }

    public function setDateFacture(?\DateTimeInterface $date_facture): static
    {
        $this->date_facture = $date_facture;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->date_commande;
    }

    public function setDateCommande(\DateTimeInterface $date_commande): static
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    public function getTotalCommande(): ?string
    {
        return $this->total_commande;
    }

    public function setTotalCommande(string $total_commande): static
    {
        $this->total_commande = $total_commande;

        return $this;
    }

    public function getAdresseLivraison(): ?string
    {
        return $this->adresse_livraison;
    }

    public function setAdresseLivraison(string $adresse_livraison): static
    {
        $this->adresse_livraison = $adresse_livraison;

        return $this;
    }

    public function getCpLivraison(): ?string
    {
        return $this->cp_livraison;
    }

    public function setCpLivraison(string $cp_livraison): static
    {
        $this->cp_livraison = $cp_livraison;

        return $this;
    }

    public function getVilleLivraison(): ?string
    {
        return $this->ville_livraison;
    }

    public function setVilleLivraison(string $ville_livraison): static
    {
        $this->ville_livraison = $ville_livraison;

        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->adresse_facturation;
    }

    public function setAdresseFacturation(string $adresse_facturation): static
    {
        $this->adresse_facturation = $adresse_facturation;

        return $this;
    }

    public function getCpFacturation(): ?string
    {
        return $this->cp_facturation;
    }

    public function setCpFacturation(string $cp_facturation): static
    {
        $this->cp_facturation = $cp_facturation;

        return $this;
    }

    public function getVilleFacturation(): ?string
    {
        return $this->ville_facturation;
    }

    public function setVilleFacturation(string $ville_facturation): static
    {
        $this->ville_facturation = $ville_facturation;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function isPayee(): ?bool
    {
        return $this->payee;
    }

    public function setPayee(bool $payee): static
    {
        $this->payee = $payee;

        return $this;
    }

    public function getModePaiement(): ?string
    {
        return $this->mode_paiement;
    }

    public function setModePaiement(string $mode_paiement): static
    {
        $this->mode_paiement = $mode_paiement;

        return $this;
    }

    public function getTotalPaye(): ?string
    {
        return $this->total_paye;
    }

    public function setTotalPaye(string $total_paye): static
    {
        $this->total_paye = $total_paye;

        return $this;
    }

    /**
     * @return Collection<int, LigneCommande>
     */
    public function getLigneCommandes(): Collection
    {
        return $this->ligneCommandes;
    }

    public function addLigneCommande(LigneCommande $ligneCommande): static
    {
        if (!$this->ligneCommandes->contains($ligneCommande)) {
            $this->ligneCommandes->add($ligneCommande);
            $ligneCommande->setCommande($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): static
    {
        if ($this->ligneCommandes->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getCommande() === $this) {
                $ligneCommande->setCommande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }

    public function addLivraison(Livraison $livraison): static
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons->add($livraison);
            $livraison->setCommande($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): static
    {
        if ($this->livraisons->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getCommande() === $this) {
                $livraison->setCommande(null);
            }
        }

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->Client;
    }

    public function setClient(?Client $Client): static
    {
        $this->Client = $Client;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
