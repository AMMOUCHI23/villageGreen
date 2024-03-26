<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Client;
use App\Entity\Commande;
use App\Entity\Employe;
use App\Entity\Fournisseur;
use App\Entity\LigneCommande;
use App\Entity\LigneLivraison;
use App\Entity\Livraison;
use App\Entity\Produit;
use App\Entity\Utilisateur;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use PhpParser\Node\Expr\New_;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    //la fonction pour hasher le mot de passe
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }




    public function load(ObjectManager $manager)
    {
        // Fournisseur 1

        $fournisseur1 = new Fournisseur;
        $fournisseur1->setNumeroSiret("12345678901234")
            ->setNomEntreprise("Meubles Excellence")
            ->setCategorieFournisseur("Constructeur")
            ->setAdresse("123 Rue des Meubles")
            ->setEmail("contact@meublesexcellence.com")
            ->setTelephone("0123456789");
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

        /*Catégorie Séjour */
        $categorie1 = new Categorie();
        $categorie1->setNomCategorie("Séjour");
        $categorie1->setPhoto("sejour.jpg");
        $manager->persist($categorie1);

        /*Sous Catégories Séjours */
        $categorie11 = new Categorie;
        $categorie11->setNomCategorie("Buffets");
        $categorie11->setPhoto("photo_b1");
        $categorie11->setParent($categorie1);
        $manager->persist($categorie11);

        $categorie12 = new Categorie;
        $categorie12->setNomCategorie("Canapés");
        $categorie12->setPhoto("photo_cp");
        $categorie12->setParent($categorie1);
        $manager->persist($categorie12);

        $categorie13 = new Categorie;
        $categorie13->setNomCategorie("Chaises");
        $categorie13->setPhoto("photo_ch");
        $categorie13->setParent($categorie1);
        $manager->persist($categorie13);

        $categorie14 = new Categorie;
        $categorie14->setNomCategorie("Décorations");
        $categorie14->setPhoto("photo_dc");
        $categorie14->setParent($categorie1);
        $manager->persist($categorie14);

        $categorie15 = new Categorie;
        $categorie15->setNomCategorie("MeubleS TV");
        $categorie15->setPhoto("MeubleS TV");
        $categorie15->setParent($categorie1);
        $manager->persist($categorie15);

        $categorie16 = new Categorie;
        $categorie16->setNomCategorie("Tapis");
        $categorie16->setPhoto("photo_tp");
        $categorie16->setParent($categorie1);
        $manager->persist($categorie16);


        /**Catégorie Cuisine */
        $categorie2 = new Categorie();
        $categorie2->setNomCategorie("Cuisine");
        $categorie2->setPhoto("cuisine.jpg");
        $manager->persist($categorie2);

        /**Sous catégories cuisine */
        $categorie21 = new Categorie;
        $categorie21->setNomCategorie("Buffets");
        $categorie21->setPhoto("photo_b1");
        $categorie21->setParent($categorie2);
        $manager->persist($categorie21);

        $categorie22 = new Categorie;
        $categorie22->setNomCategorie("Dessertes");
        $categorie22->setPhoto("photo_cp");
        $categorie22->setParent($categorie2);
        $manager->persist($categorie22);

        $categorie23 = new Categorie;
        $categorie23->setNomCategorie("Etagères Murales");
        $categorie23->setPhoto("photo_ch");
        $categorie23->setParent($categorie2);
        $manager->persist($categorie23);

        $categorie24 = new Categorie;
        $categorie24->setNomCategorie("Tables et Chaises");
        $categorie24->setPhoto("photo_dc");
        $categorie24->setParent($categorie2);
        $manager->persist($categorie24);

        /**Catégorie chambre adulte */
        $categorie3 = new Categorie();
        $categorie3->setNomCategorie("Chambre Adulte");
        $categorie3->setPhoto("chambre_adulte.jpg");
        $manager->persist($categorie3);

        /**Sous categories chambre adulte */
        $categorie31 = new Categorie;
        $categorie31->setNomCategorie("Armoires");
        $categorie31->setPhoto("photo_b1");
        $categorie31->setParent($categorie3);
        $manager->persist($categorie31);

        $categorie32 = new Categorie;
        $categorie32->setNomCategorie("Commodes");
        $categorie32->setPhoto("photo_cp");
        $categorie32->setParent($categorie3);
        $manager->persist($categorie32);

        $categorie33 = new Categorie;
        $categorie33->setNomCategorie("Lits");
        $categorie33->setPhoto("photo_ch");
        $categorie33->setParent($categorie3);
        $manager->persist($categorie33);

        $categorie34 = new Categorie;
        $categorie34->setNomCategorie("Matelats");
        $categorie34->setPhoto("photo_dc");
        $categorie34->setParent($categorie3);
        $manager->persist($categorie34);


        /**Catégorie chambre enfant et bébé*/

        $categorie4 = new Categorie();
        $categorie4->setNomCategorie("chambre Enfant et Bébé");
        $categorie4->setPhoto("chambre_enfant.jpg");
        $manager->persist($categorie4);

        /**Sous catégories chambre enfant */

        $categorie41 = new Categorie;
        $categorie41->setNomCategorie("Armoires");
        $categorie41->setPhoto("photo_b1");
        $categorie41->setParent($categorie4);
        $manager->persist($categorie41);

        $categorie42 = new Categorie;
        $categorie42->setNomCategorie("Commodes à langer");
        $categorie42->setPhoto("photo_cp");
        $categorie42->setParent($categorie4);
        $manager->persist($categorie42);

        $categorie43 = new Categorie;
        $categorie43->setNomCategorie("Lits Bébé");
        $categorie43->setPhoto("photo_ch");
        $categorie43->setParent($categorie4);
        $manager->persist($categorie43);

        $categorie44 = new Categorie;
        $categorie44->setNomCategorie("Lits Enfant");
        $categorie44->setPhoto("photo_dc");
        $categorie44->setParent($categorie4);
        $manager->persist($categorie44);

        $categorie45 = new Categorie;
        $categorie45->setNomCategorie("Matelats");
        $categorie45->setPhoto("MeubleS TV");
        $categorie45->setParent($categorie4);
        $manager->persist($categorie45);

        /**Ctégorie Bureau */
        $categorie5 = new Categorie();
        $categorie5->setNomCategorie("Bureau");
        $categorie5->setPhoto("bureau.jpg");
        $manager->persist($categorie5);

        /**Sous catégories Bureau */

        $categorie51 = new Categorie;
        $categorie51->setNomCategorie("Bureaux");
        $categorie51->setPhoto("bureau.jpg");
        $categorie51->setParent($categorie5);
        $manager->persist($categorie51);

        $categorie52 = new Categorie;
        $categorie52->setNomCategorie("Chaises");
        $categorie52->setPhoto("photo_cp");
        $categorie52->setParent($categorie5);
        $manager->persist($categorie52);

        $categorie53 = new Categorie;
        $categorie53->setNomCategorie("Etagères");
        $categorie53->setPhoto("photo_ch");
        $categorie53->setParent($categorie5);
        $manager->persist($categorie53);

        $categorie54 = new Categorie;
        $categorie54->setNomCategorie("Accessoires de Bureau");
        $categorie54->setPhoto("photo_dc");
        $categorie54->setParent($categorie5);
        $manager->persist($categorie54);

        /**Catégorie Salle de bain */
        $categorie6 = new Categorie();
        $categorie6->setNomCategorie("Salle de Bain");
        $categorie6->setPhoto("salle_de_bain.jpg");
        $manager->persist($categorie6);

        /**Sous Catégories Salle de bain */

        $categorie61 = new Categorie;
        $categorie61->setNomCategorie("Armoirs");
        $categorie61->setPhoto("photo_b1");
        $categorie61->setParent($categorie6);
        $manager->persist($categorie61);

        $categorie62 = new Categorie;
        $categorie62->setNomCategorie("Meubles Lavabos");
        $categorie62->setPhoto("photo_cp");
        $categorie62->setParent($categorie6);
        $manager->persist($categorie62);

        $categorie63 = new Categorie;
        $categorie63->setNomCategorie("Rangements");
        $categorie63->setPhoto("photo_ch");
        $categorie63->setParent($categorie6);
        $manager->persist($categorie63);

        /**Catégorie Promos */
        $categorie7 = new Categorie();
        $categorie7->setNomCategorie("Promos");
        $categorie7->setPhoto("promos.jpg");
        $manager->persist($categorie7);

        /**Catégorie Nouveautés */
        $categorie8 = new Categorie();
        $categorie8->setNomCategorie("Nouveautés");
        $categorie8->setPhoto("nouveautes.jpg");
        $manager->persist($categorie8);

        /**Ajouter des produits */
        // Produit 1
        $pr1 = new Produit();
        $pr1->setReference("REF001")
            ->setLibelle("Buffet")
            ->setDimenssion("")
            ->setCouleur("maron")
            ->setDescription("buffet avec 2 portes")
            ->setPrixAchat(150)
            ->setPhoto("Constructeur")
            ->setActif(true)
            ->setQuantiteStock(20)
            ->setStockAlert(5)
            ->setCategorie($categorie11)
            ->setFournisseur($fournisseur1);

        $manager->persist($pr1);

        // Produit 2
        $pr2 = new Produit();
        $pr2->setReference("REF002")
            ->setLibelle("Buffet MARCEAU")
            ->setDimenssion("")
            ->setCouleur("123 Rue des Meubles")
            ->setDescription("contact@meublesexcellence.com")
            ->setPrixAchat(352.20)
            ->setPhoto("Constructeur")
            ->setActif(true)
            ->setQuantiteStock(10)
            ->setStockAlert(5)
            ->setCategorie($categorie11)
            ->setFournisseur($fournisseur1);
        $manager->persist($pr2);

        // Produit 3
        $pr3 = new Produit();
        $pr3->setReference("REF003")
            ->setLibelle("Buffet OTELLO")
            ->setDimenssion("")
            ->setCouleur("blanc et maron")
            ->setDescription("Buffet avec 4 portes")
            ->setPrixAchat(249.99)
            ->setPhoto("")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie11)
            ->setFournisseur($fournisseur1);
        $manager->persist($pr3);

        // Produit 4
        $pr3 = new Produit();
        $pr3->setReference("REF004")
            ->setLibelle("Buffet CALAIS")
            ->setDimenssion("1800 mm")
            ->setCouleur("blanc ")
            ->setDescription("Buffet avec 4 porte et 3 tiroirs")
            ->setPrixAchat(299.99)
            ->setPhoto("buffet_CALAIS.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie11)
            ->setFournisseur($fournisseur1);
        $manager->persist($pr3);

        // Produit 5
        $pr5 = new Produit();
        $pr5->setReference("REF005")
            ->setLibelle("Canapé MARTENS")
            ->setDimenssion("")
            ->setCouleur("gris")
            ->setDescription("Canapé d'angle de 3 places")
            ->setPrixAchat(350)
            ->setPhoto("buffet_CALAIS.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie12)
            ->setFournisseur($fournisseur6);
        $manager->persist($pr5);

        // Produit 6
        $pr6 = new Produit();
        $pr6->setReference("REF006")
            ->setLibelle("Canapé LOMOCO")
            ->setDimenssion("")
            ->setCouleur("beige")
            ->setDescription("Canapé d'angle de 4 places")
            ->setPrixAchat(420)
            ->setPhoto("buffet_CALAIS.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie12)
            ->setFournisseur($fournisseur6);
        $manager->persist($pr6);


        // Produit 7
        $pr7 = new Produit();
        $pr7->setReference("REF007")
            ->setLibelle("Chaise bureau")
            ->setDimenssion("")
            ->setCouleur("beige")
            ->setDescription("Canapé d'angle de 4 places")
            ->setPrixAchat(75)
            ->setPhoto("buffet_CALAIS.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie52)
            ->setFournisseur($fournisseur4);
        $manager->persist($pr7);

        // Produit 8
        $pr8 = new Produit();
        $pr8->setReference("REF008")
            ->setLibelle("Chaise LOMOCO")
            ->setDimenssion("")
            ->setCouleur("beige")
            ->setDescription("Canapé d'angle de 4 places")
            ->setPrixAchat(62.35)
            ->setPhoto("buffet_CALAIS.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie52)
            ->setFournisseur($fournisseur4);
        $manager->persist($pr8);

        // Produit 9
        $pr9 = new Produit();
        $pr9->setReference("REF009")
            ->setLibelle("Etagère LOMOCO")
            ->setDimenssion("")
            ->setCouleur("maron")
            ->setDescription("")
            ->setPrixAchat(45.60)
            ->setPhoto("buffet_CALAIS.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie23)
            ->setFournisseur($fournisseur2);
        $manager->persist($pr9);

        // Produit 10
        $pr10 = new Produit();
        $pr10->setReference("REF010")
            ->setLibelle("Etagère MONGO")
            ->setDimenssion("")
            ->setCouleur("blanc")
            ->setDescription("")
            ->setPrixAchat(57.22)
            ->setPhoto("buffet_CALAIS.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie23)
            ->setFournisseur($fournisseur2);
        $manager->persist($pr10);

        //*************************************************************Ajouter des utilisateurs

        // Utilisateur 1
        $user1 = new Utilisateur();
        $user1->setNom('BERNARD')
            ->setPrenom('Christophe')
            ->setRoles(['ROLE_ADMIN']) // Notez que les rôles sont définis dans un tableau
            ->setEmail('admin@example.com')
            ->setSexe('Homme');
        $password = $this->hasher->hashPassword($user1, 'pass1234');
        $user1->setPassword($password);
        $manager->persist($user1);

        // Utilisateur 2
        $user2 = new Utilisateur();
        $user2->setNom("Dupont")
            ->setPrenom("Jean")


            ->setRoles(['ROLE_CLIENT'])
            ->setEmail("jean.dupont@example.com")
            ->setSexe('Homme');
        $password = $this->hasher->hashPassword($user2, 'pass1234');
        $user2->setPassword($password);
        $manager->persist($user2);

        // Utilisateur 3
        $user3 = new Utilisateur();
        $user3->setNom('DURAND')
            ->setPrenom('Marie')
            ->setRoles(['ROLE_CLIENT'])
            ->setEmail("marie.durand@example.com")
            ->setSexe('Femme');
        $password = $this->hasher->hashPassword($user3, 'pass1234');
        $user3->setPassword($password);
        $manager->persist($user3);

        // Utilisateur 4
        $user4 = new Utilisateur();
        $user4->setNom("Martin")
            ->setPrenom("Philippe")
            ->setEmail("philippe.martin@example.com")
            ->setRoles(['ROLE_CLIENT'])
            ->setEmail('user3@example.com')
            ->setSexe('Homme');
        $password = $this->hasher->hashPassword($user4, 'pass1234');
        $user4->setPassword($password);
        $manager->persist($user4);

        // Utilisateur 5
        $user5 = new Utilisateur();
        $user5->setNom("Garcia")
            ->setPrenom("Sophie")
            ->setEmail("sophie.garcia@example.com")
            ->setRoles(['ROLE_CLIENT'])
            ->setEmail("john.smith@example.com")
            ->setSexe('Femme');
        $password = $this->hasher->hashPassword($user5, 'pass1234');
        $user5->setPassword($password);
        $manager->persist($user5);

        // Utilisateur 6
        $user6 = new Utilisateur();
        $user6->setNom("Smith")
            ->setPrenom("John")
            ->setRoles(['ROLE_ADMIN'])
            ->setEmail('user4@example.com')
            ->setSexe('Homme');
        $password = $this->hasher->hashPassword($user6, 'pass1234');
        $user6->setPassword($password);
        $manager->persist($user6);
        // Utilisateur 7
        $user7 = new Utilisateur();
        $user7->setNom("Johnson")
            ->setPrenom("Emma")
            ->setRoles(['ROLE_COMMERTIAL'])
            ->setEmail("emma.johnson@example.com")
            ->setSexe('Femme');
        $password = $this->hasher->hashPassword($user7, 'pass1234');
        $user7->setPassword($password);
        $manager->persist($user7);

        // Utilisateur 8
        $user8 = new Utilisateur();
        $user8->setNom("Williams")
            ->setPrenom("Michael")
            ->setRoles(['ROLE_COMMERCIAL'])
            ->setEmail("michael.williams@example.com")
            ->setSexe('Homme');
        $password = $this->hasher->hashPassword($user8, 'pass1234');
        $user8->setPassword($password);
        $manager->persist($user8);

        // Utilisateur 9
        $user9 = new Utilisateur();
        $user9->setNom("Lefebvre")
            ->setPrenom("Pierre")
            ->setRoles(['ROLE_COMMERCIAL'])
            ->setEmail("pierre.lefebvre@example.com")
            ->setSexe('Homme');
        $password = $this->hasher->hashPassword($user9, 'pass1234');
        $user9->setPassword($password);
        $manager->persist($user9);

        //*************************************************************Ajouter des Employe
        // Employé 1
        $em1 = new Employe();
        $em1->setNom("Smith")
            ->setPrenom("John")
            ->setSexe("Homme")
            ->setEmail("john.smith@example.com")
            ->setPoste("Directeur des ventes")
            ->setTelephone("1234567891")
            ->setAdresse("123 Rue des Fleurs")
            ->setUtilisateur($user6);
        $manager->persist($em1);

        // Employé 2
        $em2 = new Employe($user2);
        $em2->setNom("Johnson")
            ->setPrenom("Emma")
            ->setSexe("Femme")
            ->setEmail("emma.johnson@example.com")
            ->setPoste("Service Commercial")
            ->setTelephone("1234567892")
            ->setAdresse("456 Avenue des Arbres")
            ->setUtilisateur($user7);
        $manager->persist($em2);

        // Employé 3
        $em3 = new Employe();
        $em3->setNom("Williams")
            ->setPrenom("Michael")
            ->setSexe("Homme")
            ->setEmail("michael.williams@example.com")
            ->setPoste("Service Commercial")
            ->setTelephone("1234567893")
            ->setAdresse("789 Boulevard des Étoiles")
            ->setUtilisateur($user8);
        $manager->persist($em3);

        //*************************************************************Ajouter des Clients
        // Client 1
        $client1 = new Client();
        $client1->setReferenceClient("C000001")
            ->setNom("Dupont")
            ->setPrenom("Jean")
            ->setSexe("Homme")
            ->setEmail("jean.dupont@example.com")
            ->setAdresse("123 Rue de la Liberté")
            ->setCP("75001")
            ->setVille("Paris")
            ->setTelephone("0123456789")
            ->setType("Particulier")
            ->setCoefficient(1.5)
            ->setReduction(0)
            ->setEmploye($em2)
            ->setUtilisateur($user2);
        $manager->persist($client1);

        // Client 2
        $client2 = new Client();
        $client2->setReferenceClient("C000002")
            ->setNom("Durand")
            ->setPrenom("Marie")
            ->setSexe("Femme")
            ->setEmail("marie.durand@example.com")
            ->setAdresse("456 Avenue des Roses")
            ->setCP("69002")
            ->setVille("Lyon")
            ->setTelephone("0234567891")
            ->setType("Particulier")
            ->setCoefficient(1.5)
            ->setReduction(0)
            ->setEmploye($em2)
            ->setUtilisateur($user3);
        $manager->persist($client2);

        // Client 3
        $client3 = new Client();
        $client3->setReferenceClient("C000003")
            ->setNom("Martin")
            ->setPrenom("Philippe")
            ->setSexe("Homme")
            ->setEmail("philippe.martin@example.com")
            ->setAdresse("789 Boulevard de la Paix")
            ->setCP("33000")
            ->setVille("Bordeaux")
            ->setTelephone("0345678912")
            ->setType("Particulier")
            ->setCoefficient(1.5)
            ->setReduction(0)
            ->setEmploye($em2)
            ->setUtilisateur($user4);
        $manager->persist($client3);

        // Client 4
        $client4 = new Client();
        $client4->setReferenceClient("P000001")
            ->setNom("Garcia")
            ->setPrenom("Sophie")
            ->setSexe("Femme")
            ->setEmail("sophie.garcia@example.com")
            ->setAdresse("1010 Rue du Soleil")
            ->setCP("59000")
            ->setVille("Lille")
            ->setTelephone("0456789123")
            ->setType("Particulier")
            ->setCoefficient(1.3)
            ->setReduction(0.1)
            ->setEmploye($em3)
            ->setUtilisateur($user5);
        $manager->persist($client4);

        // Client 5
        $client5 = new Client();
        $client5->setReferenceClient("P000002")
            ->setNom("Lefebvre")
            ->setPrenom("Pierre")
            ->setSexe("Homme")
            ->setEmail("pierre.lefebvre@example.com")
            ->setAdresse("1111 Avenue de la Joie")
            ->setCP("44000")
            ->setVille("Nantes")
            ->setTelephone("0567891234")
            ->setType("Particulier")
            ->setCoefficient(1.2)
            ->setReduction(0.2)
            ->setEmploye($em3)
            ->setUtilisateur($user9);
        $manager->persist($client5);

        //*************************************************************Ajouter des Commandes
        //Commande 1
        $commande1 = new Commande();
        $commande1->setNumeroFacture(1)
            ->setDateFacture(new DateTime('2024-02-23 18:02:53'))
            ->setDateCommande(new DateTime('2024-02-23 18:02:53'))
            ->setTotalCommande(850)
            ->setAdresseLivraison("123 Rue de la Liberté")
            ->setCpLivraison("75001")
            ->setVilleLivraison("Paris")
            ->setAdresseFacturation("123 Rue de la Liberté")
            ->setCpFacturation("75001")
            ->setVilleFacturation("Paris")
            ->setStatut("Livrée")
            ->setPayee(1)
            ->setModePaiement("Carte_de_cridit")
            ->setTotalPaye(850)
            ->setClient($client1);
        $manager->persist($commande1);


        //*************************************************************Ajouter des lignes Commande
        //Ligne_Commande 1     
        $lCommande1 = new LigneCommande();
        $lCommande1->setLibelle("Buffet")
            ->setQuantite(1)
            ->setPrixVente(250)
            ->setProduit($pr1)
            ->setCommande($commande1);
        $manager->persist($lCommande1);

        //Ligne_Commande 2    
        $lCommande1 = new LigneCommande();
        $lCommande1->setLibelle("Canapé LOMOCO")
            ->setQuantite(1)
            ->setPrixVente(600)
            ->setProduit($pr6)
            ->setCommande($commande1);
        $manager->persist($lCommande1);





        //*************************************************************Ajouter des livraison
        //Livraison 1     
        $livraison1 = new Livraison();
        $livraison1->setDateLivraison(new DateTime('2024-03-5 18:02:53'))
            ->setObservation("Rien à signaler")
            ->setCommande($commande1);
        $manager->persist($livraison1);
        //*************************************************************Ajouter des lignes de livraison
        //Ligne_Livraison 1    
        $ligneLivraison1 = new LigneLivraison();
        $ligneLivraison1->setLibelle("Buffet")
            ->setQuantiteLivree(1)
            ->setPrixVente(250)
            ->setLivraison($livraison1)
            ->setProduit($pr1);
        $manager->persist($ligneLivraison1);


        //Ligne_Livraison 1  
        $ligneLivraison2 = new LigneLivraison();
        $ligneLivraison2->setLibelle("Canapé LOMOCO")
            ->setQuantiteLivree(1)
            ->setPrixVente(600)
            ->setLivraison($livraison1)
            ->setProduit($pr6);
        $manager->persist($ligneLivraison2);

        $manager->flush();
    }
}
