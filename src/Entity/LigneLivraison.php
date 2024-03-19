<?php

namespace App\Entity;

use App\Repository\LigneLivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneLivraisonRepository::class)]
class LigneLivraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite_livree = null;

       #[ORM\ManyToOne(inversedBy: 'ligneLivraisons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Livraison $Livraison = null;

       #[ORM\ManyToOne(inversedBy: 'ligneLivraisons')]
       #[ORM\JoinColumn(nullable: false)]
       private ?Produit $Produit = null;

       #[ORM\Column(length: 255)]
       private ?string $libelle = null;

       #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2)]
       private ?string $prix_vente = null;

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantiteLivree(): ?int
    {
        return $this->quantite_livree;
    }

    public function setQuantiteLivree(int $quantite_livree): static
    {
        $this->quantite_livree = $quantite_livree;

        return $this;
    }

 

    public function getLivraison(): ?Livraison
    {
        return $this->Livraison;
    }

    public function setLivraison(?Livraison $Livraison): static
    {
        $this->Livraison = $Livraison;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->Produit;
    }

    public function setProduit(?Produit $Produit): static
    {
        $this->Produit = $Produit;

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

    public function getPrixVente(): ?string
    {
        return $this->prix_vente;
    }

    public function setPrixVente(string $prix_vente): static
    {
        $this->prix_vente = $prix_vente;

        return $this;
    }
}
