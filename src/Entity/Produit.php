<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'produit:item']),
        new GetCollection(normalizationContext: ['groups' => 'produit:list'])
     ],
      order: ['libelle' ],
      paginationEnabled: false,
 )]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['produit:list', 'produit:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 6)]
    #[Groups(['produit:list', 'produit:item'])]
    private ?string $reference = null;

    #[ORM\Column(length: 70)]
    #[Groups(['produit:list', 'produit:item'])]
    private ?string $libelle = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['produit:list', 'produit:item'])]
    private ?string $dimenssion = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['produit:list', 'produit:item'])]
    private ?string $couleur = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['produit:list', 'produit:item'])]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2)]
    private ?string $prix_achat = null;

    #[ORM\Column(length: 70)]
    #[Groups(['produit:list', 'produit:item'])]
    private ?string $photo = null;

    #[ORM\Column]
    private ?bool $actif = null;

    #[ORM\Column]
    #[Groups(['produit:list', 'produit:item'])]
    private ?int $quantite_stock = null;

    #[ORM\Column]
    private ?int $stock_alert = null;

    #[ORM\ManyToOne(inversedBy: 'Produit')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fournisseur $fournisseur = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $Categorie = null;

    #[ORM\OneToMany(targetEntity: LigneCommande::class, mappedBy: 'Produit')]
    private Collection $ligneCommandes;

    #[ORM\OneToMany(targetEntity: LigneLivraison::class, mappedBy: 'Produit')]
    private Collection $ligneLivraisons;

    public function __construct()
    {
        $this->ligneCommandes = new ArrayCollection();
        $this->ligneLivraisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDimenssion(): ?string
    {
        return $this->dimenssion;
    }

    public function setDimenssion(?string $dimenssion): static
    {
        $this->dimenssion = $dimenssion;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixAchat(): ?string
    {
        return $this->prix_achat;
    }

    public function setPrixAchat(string $prix_achat): static
    {
        $this->prix_achat = $prix_achat;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): static
    {
        $this->actif = $actif;

        return $this;
    }

    public function getQuantiteStock(): ?int
    {
        return $this->quantite_stock;
    }

    public function setQuantiteStock(int $quantite_stock): static
    {
        $this->quantite_stock = $quantite_stock;

        return $this;
    }

    public function getStockAlert(): ?int
    {
        return $this->stock_alert;
    }

    public function setStockAlert(int $stock_alert): static
    {
        $this->stock_alert = $stock_alert;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): static
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): static
    {
        $this->Categorie = $Categorie;

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
            $ligneCommande->setProduit($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): static
    {
        if ($this->ligneCommandes->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getProduit() === $this) {
                $ligneCommande->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LigneLivraison>
     */
    public function getLigneLivraisons(): Collection
    {
        return $this->ligneLivraisons;
    }

    public function addLigneLivraison(LigneLivraison $ligneLivraison): static
    {
        if (!$this->ligneLivraisons->contains($ligneLivraison)) {
            $this->ligneLivraisons->add($ligneLivraison);
            $ligneLivraison->setProduit($this);
        }

        return $this;
    }

    public function removeLigneLivraison(LigneLivraison $ligneLivraison): static
    {
        if ($this->ligneLivraisons->removeElement($ligneLivraison)) {
            // set the owning side to null (unless already changed)
            if ($ligneLivraison->getProduit() === $this) {
                $ligneLivraison->setProduit(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->libelle;
    }
}
