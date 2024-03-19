<?php

namespace App\Entity;

use App\Repository\LigneLivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(targetEntity: Produit::class, mappedBy: 'ligneLivraison')]
    private Collection $Produit;

    #[ORM\ManyToOne(inversedBy: 'ligneLivraisons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Livraison $Livraison = null;

    public function __construct()
    {
        $this->Produit = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Produit>
     */
    public function getProduit(): Collection
    {
        return $this->Produit;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->Produit->contains($produit)) {
            $this->Produit->add($produit);
            $produit->setLigneLivraison($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->Produit->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getLigneLivraison() === $this) {
                $produit->setLigneLivraison(null);
            }
        }

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
}
