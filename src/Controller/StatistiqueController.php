<?php

namespace App\Controller;
use DoctrineExtensions\Query\Mysql\Year;
use DoctrineExtensions\Query\Mysql\Month;
use App\Repository\CommandeRepository;
use Doctrine\ORM\Query\AST\Functions\SumFunction;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class StatistiqueController extends AbstractController
{
    #[Route('/statistique', name: 'statistique')]
    public function index(CommandeRepository $commandeRepo, Request $request): Response
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
            

        return $this->render('statistique/index.html.twig', [
            'anneeSelectionnee' => $anneeSelectionnee,
            'chiffreAffaire' => json_encode($chiffreAffaire)
        ]);
    }
}
