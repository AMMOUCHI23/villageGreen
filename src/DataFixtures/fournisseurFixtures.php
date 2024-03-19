<?php

namespace App\DataFixtures;

use App\Entity\Fournisseur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class fournisseurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Fournisseur 1
$fournisseur1 = new Fournisseur();
$fournisseur1->setNumeroSiret("12345678901234");
$fournisseur1->setNomEntreprise("Meubles Excellence");
$fournisseur1->setCategorieFournisseur("Constructeur");
$fournisseur1->setAdresse("123 Rue des Meubles");
$fournisseur1->setEmail("contact@meublesexcellence.com");
$fournisseur1->setTelephone("0123456789");
$manager->persist($fournisseur1);

// Fournisseur 2
$fournisseur2 = new Fournisseur();
$fournisseur2->setNumeroSiret("23456789012345");
$fournisseur2->setNomEntreprise("Meubles Élégance");
$fournisseur2->setCategorieFournisseur("Importateur");
$fournisseur2->setAdresse("456 Avenue du Design");
$fournisseur2->setEmail("info@meubleselegance.com");
$fournisseur2->setTelephone("1234567890");
$manager->persist($fournisseur2);

// Fournisseur 3
$fournisseur3 = new Fournisseur();
$fournisseur3->setNumeroSiret("34567890123456");
$fournisseur3->setNomEntreprise("Meubles Chic");
$fournisseur3->setCategorieFournisseur("Importateur");
$fournisseur3->setAdresse("789 Boulevard de l'Art");
$fournisseur3->setEmail("contact@meubleschic.com");
$fournisseur3->setTelephone("2345678901");
$manager->persist($fournisseur3);

// Fournisseur 4
$fournisseur4 = new Fournisseur();
$fournisseur4->setNumeroSiret("45678901234567");
$fournisseur4->setNomEntreprise("Importateur");
$fournisseur4->setCategorieFournisseur("Vente de meubles");
$fournisseur4->setAdresse("1010 Rue du Style");
$fournisseur4->setEmail("info@meublesclassiques.com");
$fournisseur4->setTelephone("3456789012");
$manager->persist($fournisseur4);

// Fournisseur 5
$fournisseur5 = new Fournisseur();
$fournisseur5->setNumeroSiret("56789012345678");
$fournisseur5->setNomEntreprise("Meubles Modernes");
$fournisseur5->setCategorieFournisseur("Constructeur");
$fournisseur5->setAdresse("1111 Avenue de la Modernité");
$fournisseur5->setEmail("contact@meublesmodernes.com");
$fournisseur5->setTelephone("4567890123");
$manager->persist($fournisseur5);

// Fournisseur 6
$fournisseur6 = new Fournisseur();
$fournisseur6->setNumeroSiret("67890123456789");
$fournisseur6->setNomEntreprise("Meubles Design");
$fournisseur6->setCategorieFournisseur("Constructeur");
$fournisseur6->setAdresse("2222 Boulevard du Design");
$fournisseur6->setEmail("info@meublesdesign.com");
$fournisseur6->setTelephone("5678901234");
$manager->persist($fournisseur6);
$manager->flush();

// Fournisseur 7
$fournisseur7 = new Fournisseur();
$fournisseur7->setNumeroSiret("78901234567890");
$fournisseur7->setNomEntreprise("Meubles Luxe");
$fournisseur7->setCategorieFournisseur("Importateur");
$fournisseur7->setAdresse("3333 Rue du Luxe");
$fournisseur7->setEmail("contact@meublesluxe.com");
$fournisseur7->setTelephone("6789012345");
$manager->persist($fournisseur7);


// Fournisseur 8
$fournisseur8 = new Fournisseur();
$fournisseur8->setNumeroSiret("89012345678901");
$fournisseur8->setNomEntreprise("Meubles Contemporains");
$fournisseur8->setCategorieFournisseur("Constructeur");
$fournisseur8->setAdresse("4444 Avenue de la Contemporanéité");
$fournisseur8->setEmail("info@meublescontemporains.com");
$fournisseur8->setTelephone("7890123456");
$manager->persist($fournisseur8);


// Fournisseur 9
$fournisseur9 = new Fournisseur();
$fournisseur9->setNumeroSiret("90123456789012");
$fournisseur9->setNomEntreprise("Meubles Rustiques");
$fournisseur9->setCategorieFournisseur("Constructeur");
$fournisseur9->setAdresse("5555 Boulevard du Rustique");
$fournisseur9->setEmail("contact@meublesrustiques.com");
$fournisseur9->setTelephone("8901234567");
$manager->persist($fournisseur9);


// Fournisseur 10
$fournisseur10 = new Fournisseur();
$fournisseur10->setNumeroSiret("01234567890123");
$fournisseur10->setNomEntreprise("Meubles Traditionnels");
$fournisseur10->setCategorieFournisseur("Constructeur");
$fournisseur10->setAdresse("6666 Rue de la Tradition");
$fournisseur10->setEmail("info@meublestraditionnels.com");
$fournisseur10->setTelephone("9012345678");
$manager->persist($fournisseur10);

$manager->flush();

    }
}
