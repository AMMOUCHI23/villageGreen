<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_livraison = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $observation = null;

    #[ORM\OneToMany(targetEntity: LigneLivraison::class, mappedBy: 'Livraison')]
    private Collection $ligneLivraisons;

    #[ORM\ManyToOne(inversedBy: 'livraisons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $Commande = null;

    public function __construct()
    {
        $this->ligneLivraisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->date_livraison;
    }

    public function setDateLivraison(\DateTimeInterface $date_livraison): static
    {
        $this->date_livraison = $date_livraison;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): static
    {
        $this->observation = $observation;

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
            $ligneLivraison->setLivraison($this);
        }

        return $this;
    }

    public function removeLigneLivraison(LigneLivraison $ligneLivraison): static
    {
        if ($this->ligneLivraisons->removeElement($ligneLivraison)) {
            // set the owning side to null (unless already changed)
            if ($ligneLivraison->getLivraison() === $this) {
                $ligneLivraison->setLivraison(null);
            }
        }

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->Commande;
    }

    public function setCommande(?Commande $Commande): static
    {
        $this->Commande = $Commande;

        return $this;
    }
}
