<?php

namespace App\Controller;
use DoctrineExtensions\Query\Mysql\Year;
use DoctrineExtensions\Query\Mysql\Month;
use App\Repository\CommandeRepository;
use App\Repository\FournisseurRepository;
use App\Repository\LigneCommandeRepository;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Query\AST\Functions\SumFunction;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class StatistiqueController extends AbstractController
{    

    //Controller pour afficher le chiffre d'affaire par année et par mois
    #[Route('/chiffreAffaire', name: 'chiffreAffaire')]
    public function recetteParMois(CommandeRepository $commandeRepo, Request $request): Response
    {   //Récupérer l'année sélectionnée par l'admin dans le formulaire de twig
        $anneeSelectionnee = $request->query->get('annee'); 
        // Calculer le chiffre d'affaire pour chaque mois de l'année sélectionnée
        $chiffreAffaire = $commandeRepo->createQueryBuilder('c')
            ->select('MONTH(c.date_commande) AS mois', 'SUM(c.total_commande) AS chiffreAffaire')
            ->where('YEAR(c.date_commande) = :annee')
            ->setParameter('annee', $anneeSelectionnee)
            ->groupBy('mois')
            ->getQuery()
            ->getResult();
          // dd($chiffreAffaire ) ;

        return $this->render('statistique/index.html.twig', [
            'anneeSelectionnee' => $anneeSelectionnee,
            'chiffreAffaire' => json_encode($chiffreAffaire),
            'now' => new \DateTime()
        ]);
    }
//Controller pour afficher le chiffre d'affaire par année et par fournisseur
#[Route('/caFournisseur', name: 'caFournisseur')]
public function recetteParFournisseur(LigneCommandeRepository $ligne, FournisseurRepository $fr, Request $request): Response
{  
    //Récupérer la liste des fournisseur
    $fournisseurs=$fr->findAll();
   //Tableau pour stocker les chiffres d'affaires par fournisseur
   $chiffreAffaireParFournisseur=[];
    //Récupérer l'année sélectionnée par l'admin dans le formulaire de twig
    $anneeSelectionnee = $request->query->get('annee'); 

    // Calculer le chiffre d'affaire par chaque fournisseur  pour une année sélectionnée

    foreach ($fournisseurs as $fournisseur) { 
        $chiffreAffaire = $ligne->createQueryBuilder('f')
    ->select('f', 'SUM(lc.quantite * lc.prix_vente) AS ca_fournisseur')
    ->join('f.Produit', 'p')
    ->join('p.ligneCommandes', 'lc')
    ->join('lc.Commande', 'c')
    ->where('f.id = :fournisseurId')
    ->andWhere('Year(c.date_commande) = :anneeSelectionnee')
    ->setParameter('fournisseurId', $fournisseur->getId())
    ->setParameter('anneeSelectionnee', $anneeSelectionnee)
    ->getQuery()
    ->getResult();
    $chiffreAffaireParFournisseur[$fournisseur->getNomEntreprise()]=$chiffreAffaire;
    }
    $nomFournisseurs=array_keys($chiffreAffaireParFournisseur);
    $chiffreAffaires=array_values($chiffreAffaireParFournisseur);
   

    return $this->render('statistique/caFournisseur.html.twig', [
        'anneeSelectionnee' => $anneeSelectionnee,
        'chiffreAffaireParFournisseur' => json_encode($chiffreAffaireParFournisseur),
        'nomFournisseurs'=>json_encode($nomFournisseurs),
        'chiffreAffaires'=>json_encode($chiffreAffaires),
        'now' => new \DateTime()
    ]);
}

}
