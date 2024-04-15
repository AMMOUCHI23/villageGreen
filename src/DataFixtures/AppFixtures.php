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
        $categorie11->setPhoto("buffets.jpg");
        $categorie11->setParent($categorie1);
        $manager->persist($categorie11);

        $categorie12 = new Categorie;
        $categorie12->setNomCategorie("Canapés");
        $categorie12->setPhoto("canapes.jpg");
        $categorie12->setParent($categorie1);
        $manager->persist($categorie12);

        $categorie13 = new Categorie;
        $categorie13->setNomCategorie("Chaises");
        $categorie13->setPhoto("chaises.jpg");
        $categorie13->setParent($categorie1);
        $manager->persist($categorie13);

        $categorie14 = new Categorie;
        $categorie14->setNomCategorie("Décorations");
        $categorie14->setPhoto("decorations.jpg");
        $categorie14->setParent($categorie1);
        $manager->persist($categorie14);

        $categorie15 = new Categorie;
        $categorie15->setNomCategorie("Meubles_TV");
        $categorie15->setPhoto("meubles_tv.jpg");
        $categorie15->setParent($categorie1);
        $manager->persist($categorie15);

        $categorie16 = new Categorie;
        $categorie16->setNomCategorie("Tapis");
        $categorie16->setPhoto("tapis.jpg");
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
        $categorie21->setPhoto("buffets.jpg");
        $categorie21->setParent($categorie2);
        $manager->persist($categorie21);

        $categorie22 = new Categorie;
        $categorie22->setNomCategorie("Dessertes");
        $categorie22->setPhoto("dessertes.jpg");
        $categorie22->setParent($categorie2);
        $manager->persist($categorie22);

        $categorie23 = new Categorie;
        $categorie23->setNomCategorie("Etagères_Murales");
        $categorie23->setPhoto("etagères_murales.jpg");
        $categorie23->setParent($categorie2);
        $manager->persist($categorie23);

        $categorie24 = new Categorie;
        $categorie24->setNomCategorie("Tables_et_Chaises");
        $categorie24->setPhoto("tables_et_chaises.jpg");
        $categorie24->setParent($categorie2);
        $manager->persist($categorie24);

        /**Catégorie chambre adulte */
        $categorie3 = new Categorie();
        $categorie3->setNomCategorie("Chambre_Adulte");
        $categorie3->setPhoto("chambre_adulte.jpg");
        $manager->persist($categorie3);

        /**Sous categories chambre adulte */
        $categorie31 = new Categorie;
        $categorie31->setNomCategorie("Armoires");
        $categorie31->setPhoto("armoires.jpg");
        $categorie31->setParent($categorie3);
        $manager->persist($categorie31);

        // Les produits de la sous catégorie armoire
        //Produit 1
        $pr35 = new Produit();
        $pr35->setReference("REF035")
            ->setLibelle("Armoire_PLASTA")
            ->setDimenssion("160x57x181 cm")
            ->setCouleur("blanc")
            ->setDescription("Créer une combinaison PLATSA adaptée à votre intérieur : plus ou moins haute, le long d'un mur ou sous un plafond mansardé. Les différents éléments s'assemblent en un clic et vous pouvez les compléter avec des portes et des organiseurs internes.")
            ->setPrixAchat(220)
            ->setPhoto("Armoire_PLASTA.jpg")
            ->setActif(true)
            ->setQuantiteStock(40)
            ->setStockAlert(5)
            ->setCategorie($categorie31)
            ->setFournisseur($fournisseur4);
        $manager->persist($pr35);

        //Produit 2
        $pr36 = new Produit();
        $pr36->setReference("REF036")
            ->setLibelle("Armoire  HASVIK")
            ->setDimenssion("160x60x145 cm")
            ->setCouleur("blanc")
            ->setDescription("Les portes coulissantes nécessitent moins d'espace à l'ouverture, laissant plus de place pour le reste du mobilier.
            Le système de fermeture/ouverture silencieuse permet d'ouvrir et de fermer les portes en douceur et en silence.")
            ->setPrixAchat(420)
            ->setPhoto("armoire_HASVIK.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie31)
            ->setFournisseur($fournisseur4);
        $manager->persist($pr36);

        //Produit 3
        $pr37 = new Produit();
        $pr37->setReference("REF037")
            ->setLibelle("Armoire VISTHUS")
            ->setDimenssion("122x59x216 cm")
            ->setCouleur("blanc")
            ->setDescription("Les tiroirs, qui sont faciles à ouvrir et à fermer, sont équipés d'arrêts.
            Les pieds réglables permettent de compenser les irrégularités du sol.
            Facile à monter.
            ")
            ->setPrixAchat(320)
            ->setPhoto("armoire_VISTHUS.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie31)
            ->setFournisseur($fournisseur4);
        $manager->persist($pr37);

        //Produit 4
        $pr38 = new Produit();
        $pr38->setReference("REF035")
            ->setLibelle("armoire BERGSBO")
            ->setDimenssion("250x60x201 cm")
            ->setCouleur("maron")
            ->setDescription("Si vous aimez plier vos vêtements, cette armoire est faites pour vous : beaucoup d'étagères pour toutes les affaires qui peuvent être pliées, enroulées, ou ne rentrent pas dans les tiroirs.")
            ->setPrixAchat(620)
            ->setPhoto("armoire_BERGSBO.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie31)
            ->setFournisseur($fournisseur4);
        $manager->persist($pr38);

        //Produit 5
        $pr39 = new Produit();
        $pr39->setReference("REF035")
            ->setLibelle("armoire AULI")
            ->setDimenssion("122x59x216 cm")
            ->setCouleur("blanc")
            ->setDescription("Inutile de vous compliquer la vie : voici un rangement simple pour commencer. Il comporte suffisamment d'espace pour que vous puissiez y ajouter des solutions ensuite si vous le voulez.")
            ->setPrixAchat(320)
            ->setPhoto("armoire_AULI.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie31)
            ->setFournisseur($fournisseur4);
        $manager->persist($pr39);

        //Produit 6
        $pr40 = new Produit();
        $pr40->setReference("REF040")
            ->setLibelle("Armoire MEHAMN")
            ->setDimenssion("200x44x236 cm")
            ->setCouleur("blanc et maron")
            ->setDescription("Cette armoire, peu profonde mais large, peut contenir manteaux, chaussures et accessoires pour toute la famille. Sa partie basse permet de ranger les affaires des enfants à leur portée et d'encourager même les plus petits à les remettre à leur place.")
            ->setPrixAchat(520)
            ->setPhoto("armoire_MEHAMN.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie31)
            ->setFournisseur($fournisseur4);
        $manager->persist($pr40);

        $categorie32 = new Categorie;
        $categorie32->setNomCategorie("Commodes");
        $categorie32->setPhoto("commodes.jpg");
        $categorie32->setParent($categorie3);
        $manager->persist($categorie32);

        // Les produits de la sous catégorie commode
        //Produit 1
        $pr41 = new Produit();
        $pr41->setReference("REF041")
            ->setLibelle("Commode MALM")
            ->setDimenssion("80x78x110 cm")
            ->setCouleur("blanc")
            ->setDescription("Avec son style épuré, ses tiroirs qui coulissent en douceur et son choix de finitions, cette commode trouvera sa place dans toutes les pièces.")
            ->setPrixAchat(60)
            ->setPhoto("commode_MALM.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie32)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr41);
        //Produit 2
        $pr42 = new Produit();
        $pr42->setReference("REF042")
            ->setLibelle("commode KULLEN")
            ->setDimenssion("140x72x80 cm")
            ->setCouleur("blanc")
            ->setDescription("Une commode toute simple au style épuré qui trouve facilement sa place dans une chambre ou toute autre pièce. Il y a de la place pour vos vêtements et le linge de lit. Psst ! N'oubliez pas de la fixer au mur.")
            ->setPrixAchat(90)
            ->setPhoto("commode_KULLEN.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie32)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr42);

        //Produit 3
        $pr43 = new Produit();
        $pr43->setReference("REF041")
            ->setLibelle("Commode HEMNES")
            ->setDimenssion("160x96x145 cm")
            ->setCouleur("blanc")
            ->setDescription("Une commode de style classique en bois massif qui offre un aspect traditionnel mais des fonctionnalités modernes. Dans les tiroirs à fermeture silencieuse vous pourrez ranger toutes vos affaires. Psst ! Pensez à fixer votre meuble au mur.")
            ->setPrixAchat(250)
            ->setPhoto("bureau_MICKE.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie32)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr43);

        //Produit 4
        $pr44 = new Produit();
        $pr44->setReference("REF044")
            ->setLibelle("Commode HAUGA")
            ->setDimenssion("138x84x120 cm")
            ->setCouleur("blanc")
            ->setDescription("À utiliser dans la chambre ou dans la maison, seul ou à combiner à d'autres produits de la série HAUGA. Cette commode large dispose de nombreux espaces de rangement. Le dessus est idéal pour exposer vos plus beaux objets.")
            ->setPrixAchat(120)
            ->setPhoto("commode_HAUGA.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie32)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr44);

        //Produit 5
        $pr45 = new Produit();
        $pr45->setReference("REF045")
            ->setLibelle("Commode SONGESAND")
            ->setDimenssion("161x81x90 cm")
            ->setCouleur("blanc")
            ->setDescription("Un design simple et intemporel pour ces faces de tiroirs avec panneau et cadre.
            Les tiroirs, qui sont faciles à ouvrir et à fermer, sont équipés d'arrêts")
            ->setPrixAchat(150)
            ->setPhoto("commode_SONGESAND.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie32)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr45);

        //Produit 6
        $pr46 = new Produit();
        $pr46->setReference("REF046")
            ->setLibelle("Commode vVIHALS")
            ->setDimenssion("165x47x90 cm")
            ->setCouleur("blanc")
            ->setDescription("Les tiroirs de différentes tailles répondent à différents besoins de rangement.
            Le cadre est facile à monter grâce au système ingénieux de chevilles à encastrer, qui se clipsent facilement dans les trous pré-percés.")
            ->setPrixAchat(170)
            ->setPhoto("commode_VIHALS.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie32)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr46);

        $categorie33 = new Categorie;
        $categorie33->setNomCategorie("Lits");
        $categorie33->setPhoto("lits.jpg");
        $categorie33->setParent($categorie3);
        $manager->persist($categorie33);

        // Les produits de la sous catégorie lit
        //Produit 1
        $pr47 = new Produit();
        $pr47->setReference("REF047")
            ->setLibelle("Lit MALM")
            ->setDimenssion("140x200 cm")
            ->setCouleur("blanc")
            ->setDescription("Ce lit vous permet d'avoir un grand espace de rangement sans occuper davantage de place dans la pièce. Il suffit de soulever la base et d'y glisser vos affaires. Le lit peut être placé au milieu de la pièce ou avec la tête de lit contre le mur.")
            ->setPrixAchat(350)
            ->setPhoto("lit_MALM.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie33)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr47);

        //Produit 2
        $pr48 = new Produit();
        $pr48->setReference("REF048")
            ->setLibelle("Lit HEMNES")
            ->setDimenssion("160x220 cm")
            ->setCouleur("blanc")
            ->setDescription("Beauté éternelle du bois massif ; ce matériau résistant conserve son caractère authentique au fil du temps. Peut être combiné avec les autres meubles de la série HEMNES.")
            ->setPrixAchat(220)
            ->setPhoto("lit_HEMNES.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie33)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr48);

        //Produit 3
        $pr49 = new Produit();
        $pr49->setReference("REF049")
            ->setLibelle("Lit IDANAS")
            ->setDimenssion("140x200 cm")
            ->setCouleur("maron")
            ->setDescription("La tête de lit inclinée et le rembourrage souple rendent ce lit coffre IDANÄS particulièrement confortable. Les détails comme les classiques boutons sont intemporels, tandis que l'espace sous le lit offre de grands rangements pratiques.")
            ->setPrixAchat(640)
            ->setPhoto("lit_IDANAS.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie33)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr49);

        //Produit 4
        $pr50 = new Produit();
        $pr50->setReference("REF050")
            ->setLibelle("Lit HOGA")
            ->setDimenssion("90x200 cm")
            ->setCouleur("blanc")
            ->setDescription("
            Avec des tiroirs sous le cadre de lit tapissé, vous aurez à la fois un lit confortable et de spacieux rangements. Le tissu beige lisse, la tête de lit arrondie et le passepoil contribuent au style classique dont vous pourrez longtemps profiter.")
            ->setPrixAchat(190)
            ->setPhoto("lit_HOGA.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie33)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr50);

        //Produit 5
        $pr51 = new Produit();
        $pr51->setReference("REF051")
            ->setLibelle("Lit ASKVOLL")
            ->setDimenssion("140x200 cm")
            ->setCouleur("blanc")
            ->setDescription("Vous pouvez choisir de mettre en avant le style épuré de ce lit ou bien le laisser mettre en valeur vos textiles favoris et autres meubles. La tête de lit basse permet de placer le lit sous une fenêtre ou un plafond mansardé.")
            ->setPrixAchat(90)
            ->setPhoto("lit_ASKVOLL.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie33)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr51);

        //Produit 6
        $pr52 = new Produit();
        $pr52->setReference("REF052")
            ->setLibelle("Lit LYNGOR")
            ->setDimenssion("140x200 cm")
            ->setCouleur("blanc")
            ->setDescription("Le sommier LYNGÖR combiné au matelas VALEVÅG. En voilà une paire confortable ! Le sommier avec lattes plates offre une surface uniforme sur laquelle poser le matelas, tandis que le matelas dispose de ressorts ensachés et cinq zones de confort.")
            ->setPrixAchat(340)
            ->setPhoto("lit_LYNGOR.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie33)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr52);



        $categorie34 = new Categorie;
        $categorie34->setNomCategorie("Matelats");
        $categorie34->setPhoto("matelas.jpg");
        $categorie34->setParent($categorie3);
        $manager->persist($categorie34);

        // Les produits de la sous catégorie Matelas
        //Produit 1
        $pr53 = new Produit();
        $pr53->setReference("REF053")
            ->setLibelle("Matelats VALEVAG")
            ->setDimenssion("160x200x24 cm")
            ->setCouleur("blanc")
            ->setDescription("Un matelas ferme de 24 cm d'épaisseur avec ressorts ensachés individuellement. Les zones de confort permettent une bonne répartition du poids et un soutien moelleux au niveau des hanches et épaules. Une épaisse couche de mousse ajoute du confort.")
            ->setPrixAchat(220)
            ->setPhoto("matelats_VALEVAG.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie34)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr53);

        //Produit 2
        $pr54 = new Produit();
        $pr54->setReference("REF054")
            ->setLibelle("Matelas ABYGDA")
            ->setDimenssion("160x200x20 cm")
            ->setCouleur("blanc")
            ->setDescription("Un matelas ferme de 16 cm d'épaisseur avec deux couches de mousse. La couche supérieure en mousse à mémoire de forme soulage la pression, tandis que le corps est parfaitement soutenu grâce aux zones de confort. Le coutil en maille doux est lavable.")
            ->setPrixAchat(180)
            ->setPhoto("matelas_ABYGDA.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie34)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr54);

        //Produit 3
        $pr55 = new Produit();
        $pr55->setReference("REF055")
            ->setLibelle("Matelas VAGSTRANDA")
            ->setDimenssion("160x200x28 cm")
            ->setCouleur("blanc")
            ->setDescription("Un matelas ferme de 28 cm d'épaisseur avec une double couche de matelas à ressorts ensachés. Il offre un bon niveau de confort et un soutien parfait grâce aux zones de confort, qui s'adaptent au ")
            ->setPrixAchat(280)
            ->setPhoto("matelas_VAGSTRANDA.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie34)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr55);

        //Produit 4
        $pr56 = new Produit();
        $pr56->setReference("REF056")
            ->setLibelle("Matelas AGOTNES")
            ->setDimenssion("90x200x15 cm")
            ->setCouleur("gris")
            ->setDescription("Matelas ferme en mousse de 10 cm d'épaisseur. Il se compose d'une couche de mousse résiliente et d'une couche de garnissage en mousse moelleuse.")
            ->setPrixAchat(20)
            ->setPhoto("matelas_AGOTNES.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie34)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr56);

        //Produit 5
        $pr57 = new Produit();
        $pr57->setReference("REF057")
            ->setLibelle("Matelas VADSO")
            ->setDimenssion("140x200x20 cm")
            ->setCouleur("gris")
            ->setDescription("Un matelas ferme de 17 cm d'épaisseur avec ressorts Bonnell. La couche supérieure de mousse, ainsi que le garnissage du coutil, offrent beaucoup de moelleux.")
            ->setPrixAchat(90)
            ->setPhoto("matelas_VADSO.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie34)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr56);

        //Produit 6
        $pr58 = new Produit();
        $pr58->setReference("REF058")
            ->setLibelle("Matelas VATNESTROM")
            ->setDimenssion("160x200x30 cm")
            ->setCouleur("blanc")
            ->setDescription("Un matelas ferme de 26 cm d'épaisseur avec ressorts ensachés. Les zones de confort permettent une bonne répartition du poids du corps et un soutien moelleux au niveau des hanches et des épaules. Le latex ajoute du confort.")
            ->setPrixAchat(600)
            ->setPhoto("matelas_VATNESTROM.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie34)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr58);


        /**Catégorie chambre enfant et bébé*/

        $categorie4 = new Categorie();
        $categorie4->setNomCategorie("Chambre_Enfant_Bébé");
        $categorie4->setPhoto("chambre_enfant_bebe.jpg");
        $manager->persist($categorie4);

        /**Sous catégories chambre enfant */

        $categorie41 = new Categorie;
        $categorie41->setNomCategorie("Armoires");
        $categorie41->setPhoto("armoire.jpg");
        $categorie41->setParent($categorie4);
        $manager->persist($categorie41);

        // Les produits de la sous catégorie armoire
        //Produit 1
        $pr59 = new Produit();
        $pr59->setReference("REF059")
            ->setLibelle("armoire PLATSA")
            ->setDimenssion("120x42x123 cm")
            ->setCouleur("bleu-vert")
            ->setDescription("Une armoire pour les vêtements, des tablettes ouvertes pour les livres et des tiroirs pour les petits objets. Le tout sous la forme d'un meuble qui ne prend pas beaucoup d'espace et adapté à la taille de jeunes enfants.")
            ->setPrixAchat(140)
            ->setPhoto("armoire_PLATSA.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie41)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr59);

        //Produit 2
        $pr60 = new Produit();
        $pr60->setReference("REF060")
            ->setLibelle("Armoire SMASTAD")
            ->setDimenssion("60x42x181 cm")
            ->setCouleur("blanc")
            ->setDescription("Style sportif un jour ou plus chic le lendemain. À un certain âge, changez de style fait partie du quotidien. Cette penderie est assez grande pour accommoder tous ces changements, sans pour autant occuper trop de place.")
            ->setPrixAchat(90)
            ->setPhoto("armoire_SMASTAD.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie41)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr60);

        //Produit 3
        $pr61 = new Produit();
        $pr61->setReference("REF061")
            ->setLibelle("Armoire SUNDVIK")
            ->setDimenssion("80x50x171 cm")
            ->setCouleur("blanc")
            ->setDescription("Le design est intemporel, les matériaux sont solides et les détails soignés. Cette armoire est également assez profonde pour accueillir des cintres de grande taille, pour qu'elle puisse accompagner votre enfant de l'enfance à l'âge adulte.")
            ->setPrixAchat(180)
            ->setPhoto("armoire_SUNDVIK.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie41)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr61);

        //Produit 4
        $pr62 = new Produit();
        $pr62->setReference("REF062")
            ->setLibelle("Armoire SMAGORA")
            ->setDimenssion("80x50x187 cm")
            ->setCouleur("blanc")
            ->setDescription("Le rail et les étagères de l'armoire permettent de garder vos vêtements pliés ou de les suspendre.
         Les bords et les coins des meubles sont arrondis.
         Assez profond pour recevoir des cintres pour adulte.")
            ->setPrixAchat(90)
            ->setPhoto("armoire_SMAGORA.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie41)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr62);

        //Produit 5
        $pr63 = new Produit();
        $pr63->setReference("REF063")
            ->setLibelle("Armoire GODISHUS")
            ->setDimenssion("60x51x178 cm")
            ->setCouleur("blanc")
            ->setDescription("Cette grande armoire dispose d'une tringle à vêtements et de tablettes. Elle est aussi assez profonde pour y mettre des cintres de taille normale : pratique quand votre enfant grandit.")
            ->setPrixAchat(90)
            ->setPhoto("armoire_GODISHUS.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie41)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr63);

        //Produit 6
        $pr64 = new Produit();
        $pr64->setReference("REF064")
            ->setLibelle("Armoire BUSUNGE")
            ->setDimenssion("60x80x139 cm")
            ->setCouleur("blanc")
            ->setDescription("Pour ceux et celles qui adorent le blanc : une grande armoire pour mettre les chaussures, les pulls pliés et les vêtements sur des cintres. La hauteur de la tringle à vêtements et des tablettes peut être ajustée à mesure que l'enfant grandit.")
            ->setPrixAchat(80)
            ->setPhoto("armoire_BUSUNGE.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie41)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr64);




        $categorie42 = new Categorie;
        $categorie42->setNomCategorie("Tables_à_langer");
        $categorie42->setPhoto("table_langer.jpg");
        $categorie42->setParent($categorie4);
        $manager->persist($categorie42);

        // les produits de la sous catégorie Table à langer
        //Produit 1
        $pr65 = new Produit();
        $pr65->setReference("REF065")
            ->setLibelle("Table SUNDVIK")
            ->setDimenssion("99x79x50 cm")
            ->setCouleur("blanc")
            ->setDescription("Les couches, vêtements et autres produits sont toujours rangés à portée de main. Une fois passé le stade des couches, il suffit de replier et d’accrocher la rallonge de la table à langer pour la transformer en une commode.")
            ->setPrixAchat(150)
            ->setPhoto("table_SUNDVIK.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie42)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr65);

        //Produit 2
        $pr66 = new Produit();
        $pr66->setReference("REF066")
            ->setLibelle("table SMASTAD")
            ->setDimenssion("90x79x100 cm")
            ->setCouleur("blanc")
            ->setDescription("Cette table à langer est à la hauteur idéale pour changer les couches de bébé. Elle dispose de rangements qui permettent d'avoir les couches, les lotions et les carrés de mousseline toujours à portée de main.")
            ->setPrixAchat(120)
            ->setPhoto("table_SMASTAD.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie42)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr66);

        //Produit 3
        $pr67 = new Produit();
        $pr67->setReference("REF067")
            ->setLibelle("Table SNIGLAR")
            ->setDimenssion("72x53x139 cm")
            ->setCouleur("maron")
            ->setDescription("Un lieu sûr où votre bébé et vous apprendrez à faire connaissance en toute quiétude. Une table à langer à bonne hauteur, avec des rangements accessibles, pour toujours garder une main sur bébé.")
            ->setPrixAchat(20)
            ->setPhoto("table_SNIGLAR.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie42)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr67);

        //Produit 4
        $pr68 = new Produit();
        $pr68->setReference("REF068")
            ->setLibelle("Table GULLIVER")
            ->setDimenssion("82x54x95 cm")
            ->setCouleur("blanc")
            ->setDescription("Un lieu sûr où votre bébé et vous apprendrez à faire connaissance en toute quiétude. Une table à langer à bonne hauteur, avec des rangements accessibles, pour toujours garder une main sur bébé.")
            ->setPrixAchat(60)
            ->setPhoto("table_GULLIVER.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie42)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr68);

        //Produit 5
        $pr69 = new Produit();
        $pr69->setReference("REF069")
            ->setLibelle("Table ALSKVARD")
            ->setDimenssion("82x54x95 cm")
            ->setCouleur("blanc")
            ->setDescription("Donnez un style scandinave à toute la chambre de bébé grâce à la série ÄLSKVÄRD. Ici, vous pouvez facilement ranger couches et vêtements à portée de main. Une fois que bébé n'utilise plus de couches, il est possible de la transformer en commode.")
            ->setPrixAchat(190)
            ->setPhoto("table_ALSKVARD.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie42)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr69);

        //Produit 6
        $pr70 = new Produit();
        $pr70->setReference("REF070")
            ->setLibelle("Table MYLLRA")
            ->setDimenssion("82x54x97 cm")
            ->setCouleur("blanc")
            ->setDescription("Vous pourrez transformer cette table à langer en commode et en étagère murale une fois que votre enfant aura grandi. Sa forme et sa couleur se combinent à celles de la série SMÅSTAD, vous permettant ainsi de répondre à tous vos besoins de rangement.")
            ->setPrixAchat(220)
            ->setPhoto("table_MYLLRA.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie42)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr70);


        $categorie43 = new Categorie;
        $categorie43->setNomCategorie("Lits_Bébé");
        $categorie43->setPhoto("lits_bebe.jpg");
        $categorie43->setParent($categorie4);
        $manager->persist($categorie43);

        //Les produits de la sous catégorie lits bébé
        //Produit 1
        $pr71 = new Produit();
        $pr71->setReference("REF071")
            ->setLibelle("Lit SUNDVIK")
            ->setDimenssion("60x120 cm")
            ->setCouleur("blanc")
            ->setDescription("Votre enfant peut utiliser ce lit pendant plusieurs années. Le design est intemporel, les matériaux sont solides et les détails sont soignés. Le fond du lit s’abaisse et l’un des côtés est amovible pour que le lit grandisse avec votre enfant.")
            ->setPrixAchat(120)
            ->setPhoto("lit_SUNDVIK.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie43)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr71);


        //Produit 2
        $pr72 = new Produit();
        $pr72->setReference("REF072")
            ->setLibelle("Lit GONATT")
            ->setDimenssion("60x120 cm")
            ->setCouleur("blanc")
            ->setDescription("L’aspect et le toucher de ce lit bébé révèlent une conception soignée dans les moindres détails. Des formes douces, des matériaux résistants et une structure solide avec des éléments pratiques et un grand tiroir en-dessous.")
            ->setPrixAchat(150)
            ->setPhoto("lit_GONATT.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie43)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr72);


        //Produit 3
        $pr73 = new Produit();
        $pr73->setReference("REF072")
            ->setLibelle("Lit MYLLRA")
            ->setDimenssion("60x120 cm")
            ->setCouleur("blanc")
            ->setDescription("Le lit bébé MYLLRA a un fond réglable et votre enfant y dormira en toute sécurité durant chaque phase de son développement. Et quand il pourra se coucher et se lever tout seul, il vous suffira de retirer l'un des côtés")
            ->setPrixAchat(250)
            ->setPhoto("lit_MYLLRA.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie43)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr73);


        //Produit 4
        $pr74 = new Produit();
        $pr74->setReference("REF074")
            ->setLibelle("Lit ALSKVARD")
            ->setDimenssion("60x120 cm")
            ->setCouleur("blanc")
            ->setDescription("Donnez un style scandinave à toute la chambre de bébé grâce à la série ÄLSKVÄRD. Votre enfant pourra utiliser ce lit bébé pendant de nombreuses années, car il est possible d'abaisser le fond et de remplacer l'un des côtés par une barrière de lit.")
            ->setPrixAchat(180)
            ->setPhoto("lit_ALSKVARD.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie43)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr74);


        //Produit 5
        $pr75 = new Produit();
        $pr75->setReference("REF075")
            ->setLibelle("Lit SNIGLAR")
            ->setDimenssion("60x120 cm")
            ->setCouleur("maron")
            ->setDescription("Votre bébé pourra dormir confortablement et en toute sécurité dans ce berceau. Fabriqué en hêtre massif, un matériau solide et résistant.")
            ->setPrixAchat(30)
            ->setPhoto("lit_MICKE.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie43)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr75);


        //Produit 6
        $pr76 = new Produit();
        $pr76->setReference("REF076")
            ->setLibelle("Lit SMAGORA")
            ->setDimenssion("60x120 cm")
            ->setCouleur("blanc")
            ->setDescription("Avec son design intemporel, ses bords biseautés et ses angles arrondis, ce produit est tout aussi sûr que nos autres lits bébé, et plus doux pour votre porte-monnaie.")
            ->setPrixAchat(120)
            ->setPhoto("lit_SMAGORA.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie43)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr76);




        $categorie44 = new Categorie;
        $categorie44->setNomCategorie("Lits_Enfant");
        $categorie44->setPhoto("lits_enfant.jpg");
        $categorie44->setParent($categorie4);
        $manager->persist($categorie44);

        //Les produits de la sous catégorie lits enfant

        //Produit 1
        $pr77 = new Produit();
        $pr77->setReference("REF077")
            ->setLibelle("Lit SLAKT")
            ->setDimenssion("90x200 cm")
            ->setCouleur("blanc")
            ->setDescription("Le rêve des adolescents. Ce lit est confortable et offre de nombreuses solutions de rangement pour y mettre vêtements ou affaires de sport. Tout est rangé dans un même endroit et facilement accessible.")
            ->setPrixAchat(220)
            ->setPhoto("lit_SLAKT.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie44)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr77);

         //Produit 2
         $pr78 = new Produit();
         $pr78->setReference("REF078")
             ->setLibelle("Lit MALM")
             ->setDimenssion("90x200 cm")
             ->setCouleur("blanc")
             ->setDescription("Un design épuré. Esthétique de tous les côtés vous pouvez le placer au milieu d'une pièce ou avec la tête de lit contre le mur. Si vous avez besoin de place pour ranger des couettes ou des oreillers, ajoutez-y les rangements MALM sur roulettes.")
             ->setPrixAchat(90)
             ->setPhoto("lit_MALM.jpg")
             ->setActif(true)
             ->setQuantiteStock(30)
             ->setStockAlert(5)
             ->setCategorie($categorie44)
             ->setFournisseur($fournisseur5);
         $manager->persist($pr78);


          //Produit 3
        $pr79 = new Produit();
        $pr79->setReference("REF079")
            ->setLibelle("Lit MONDAL")
            ->setDimenssion("90x200 cm")
            ->setCouleur("blanc")
            ->setDescription("En bois massif, un matériau naturel et résistant à l'usure.
            Cadre du sommier/ Face de tiroir/ Fond de tiroir:
            Panneau de fibres de bois, peinture acrylique
            Côtés de tiroir/ Arrière de tiroir/ Pied de soutien/ Support médian:
            bouleau massif")
            ->setPrixAchat(180)
            ->setPhoto("lit_MONDAL.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie44)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr79);

         //Produit 4
         $pr80 = new Produit();
         $pr80->setReference("REF080")
             ->setLibelle("Lit NEIDEN")
             ->setDimenssion("90x200 cm")
             ->setCouleur("pin")
             ->setDescription("Le bois massif non traité a du charme mais vous pouvez aussi le personnaliser avec une couche de teinture, de peinture ou de cire. La structure est assez haute pour placer des boîtes de rangement en dessous.")
             ->setPrixAchat(40)
             ->setPhoto("lit_NEIDEN.jpg")
             ->setActif(true)
             ->setQuantiteStock(30)
             ->setStockAlert(5)
             ->setCategorie($categorie44)
             ->setFournisseur($fournisseur5);
         $manager->persist($pr80);

          //Produit 5
        $pr81 = new Produit();
        $pr81->setReference("REF081")
            ->setLibelle("Lit KURA")
            ->setDimenssion("90x200 cm")
            ->setCouleur("blanc/pin")
            ->setDescription("Ce lit bas est adapté aux jeunes enfants et grandit avec eux. Vous pouvez le retourner quand votre enfant devient plus grand, pour créer un espace de jeux grand et confortable.")
            ->setPrixAchat(110)
            ->setPhoto("lit_KURA.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie44)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr81);

         //Produit 6
         $pr82 = new Produit();
         $pr82->setReference("REF082")
             ->setLibelle("Lit MYDAL")
             ->setDimenssion("90x200 cm")
             ->setCouleur("blanc")
             ->setDescription("Ce lit superposé, à petit prix, est fabriqué en bois massif, un matériau solide qui dure de nombreuses années et peut-être recyclé le jour où votre enfant quitte le nid.")
             ->setPrixAchat(110)
             ->setPhoto("lit_MYDAL.jpg")
             ->setActif(true)
             ->setQuantiteStock(30)
             ->setStockAlert(5)
             ->setCategorie($categorie44)
             ->setFournisseur($fournisseur5);
         $manager->persist($pr82);

        $categorie45 = new Categorie;
        $categorie45->setNomCategorie("Matelats");
        $categorie45->setPhoto("matelas.jpg");
        $categorie45->setParent($categorie4);
        $manager->persist($categorie45);

        // Les produits de la sous catégorie matelat

         //Produit 1
         $pr83 = new Produit();
         $pr83 ->setReference("REF083")
             ->setLibelle("Matelas HIMLAVALV")
             ->setDimenssion("60x120x10 cm")
             ->setCouleur("blanc")
             ->setDescription("Les jeunes enfants mouillent souvent leur lit. Cela peut être un problème, tout comme la poussière ou les allergies. C’est pour cela que ce matelas peut se rincer à l’eau et sécher à l’air libre et que sa housse est amovible et lavable en machine.")
             ->setPrixAchat(60)
             ->setPhoto("matelas_HIMLAVALV.jpg")
             ->setActif(true)
             ->setQuantiteStock(30)
             ->setStockAlert(5)
             ->setCategorie($categorie45)
             ->setFournisseur($fournisseur5);
         $manager->persist($pr83);

         //Produit 2
         $pr84 = new Produit();
         $pr84 ->setReference("REF084")
             ->setLibelle("Matelas UNDERLIG")
             ->setDimenssion("70x160 cm")
             ->setCouleur("blanc")
             ->setDescription("Votre enfant a besoin d'un endroit confortable et à la bonne taille pour se sentir en sécurité la nuit. Le matelas UNDERLIG s'adapte parfaitement à nos lits pour enfant et permet à votre bambin de dormir dans son premier lit de grand.")
             ->setPrixAchat(40)
             ->setPhoto("matelas_UNDERLIG.jpg")
             ->setActif(true)
             ->setQuantiteStock(30)
             ->setStockAlert(5)
             ->setCategorie($categorie45)
             ->setFournisseur($fournisseur5);
         $manager->persist($pr84);

         //Produit 3
         $pr85 = new Produit();
         $pr85 ->setReference("REF085")
             ->setLibelle("Matelat DROMMANDE")
             ->setDimenssion("60x120x1 cm")
             ->setCouleur("blanc")
             ->setDescription("Le coeur du matelas DRÖMMANDE est composé de ressorts ensachés et enveloppés d'un mélange de fibres de coco et de latex naturel. Résultat : un matelas résilient et sûr, qui laisse l'air circuler et garantit un sommeil confortable à votre bébé.")
             ->setPrixAchat(120)
             ->setPhoto("matelat_DROMMANDE.jpg")
             ->setActif(true)
             ->setQuantiteStock(30)
             ->setStockAlert(5)
             ->setCategorie($categorie45)
             ->setFournisseur($fournisseur5);
         $manager->persist($pr85);

         //Produit 4
         $pr86 = new Produit();
         $pr86 ->setReference("REF086")
             ->setLibelle("Matelas OMSINT")
             ->setDimenssion("80x200 cm")
             ->setCouleur("blanc")
             ->setDescription("Ce matelas de 12 cm d'épaisseur, en 3 parties, est composé de ressorts ensachés individuellement et recouverts d'une épaisse couche de mousse. S'adapte à la taille de votre enfant et au lit extensible, de 130 à 165 ou 200 cm.")
             ->setPrixAchat(120)
             ->setPhoto("matelas_OMSINT.jpg")
             ->setActif(true)
             ->setQuantiteStock(30)
             ->setStockAlert(5)
             ->setCategorie($categorie45)
             ->setFournisseur($fournisseur5);
         $manager->persist($pr86);

         //Produit 5
         $pr87 = new Produit();
         $pr87 ->setReference("REF087")
             ->setLibelle("Matelas KRUMMELUR")
             ->setDimenssion("60x120x8 cm")
             ->setCouleur("blanc")
             ->setDescription("Nos matelas pour bébé sont fabriqués avec des matériaux durables et sûrs. Ils ont été testés et ne contiennent aucune substance pouvant présenter un danger pour la peau ou la santé de votre bébé. Tout le monde dormira sur ses deux oreilles. ")
             ->setPrixAchat(25)
             ->setPhoto("matelas_KRUMMELUR.jpg")
             ->setActif(true)
             ->setQuantiteStock(30)
             ->setStockAlert(5)
             ->setCategorie($categorie45)
             ->setFournisseur($fournisseur5);
         $manager->persist($pr87);

         //Produit 6
         $pr88 = new Produit();
         $pr88 ->setReference("REF088")
             ->setLibelle("Matelas SKONAST")
             ->setDimenssion("60x120x8 cm")
             ->setCouleur("blanc")
             ->setDescription("Nos matelas pour bébé sont fabriqués avec des matériaux durables et sûrs. Ils ont été testés et ne contiennent aucune substance pouvant présenter un danger pour la peau ou la santé de votre bébé. Tout le monde dormira sur ses deux oreilles.")
             ->setPrixAchat(40)
             ->setPhoto("matelas_SKONAST.jpg")
             ->setActif(true)
             ->setQuantiteStock(30)
             ->setStockAlert(5)
             ->setCategorie($categorie45)
             ->setFournisseur($fournisseur5);
         $manager->persist($pr88);

        /**Ctégorie Bureau */
        $categorie5 = new Categorie();
        $categorie5->setNomCategorie("Bureau");
        $categorie5->setPhoto("bureaux.jpg");
        $manager->persist($categorie5);

        /**Sous catégories Bureau */

        $categorie51 = new Categorie;
        $categorie51->setNomCategorie("Bureaux");
        $categorie51->setPhoto("bureau.jpg");
        $categorie51->setParent($categorie5);
        $manager->persist($categorie51);

        //les produits de la sous categorie bureau
        // Produit 1
        $pr11 = new Produit();
        $pr11->setReference("REF011")
            ->setLibelle("Bureau 03 tiroirs")
            ->setDimenssion("113x42x73 cm")
            ->setCouleur("blanc")
            ->setDescription("Un petit espace ne veut pas dire qu'on ne peut pas étudier ou travailler confortablement. Ce bureau ne prend pas beaucoup de place au sol et compte deux caissons de tiroirs pour ranger vos documents et tout ce dont vous avez besoin.")
            ->setPrixAchat(50)
            ->setPhoto("bureau_3_tiroirs.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie51)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr11);

        // Produit 2
        $pr12 = new Produit();
        $pr12->setReference("REF012")
            ->setLibelle("Bureau d'angle")
            ->setDimenssion("120x60x80 cm")
            ->setCouleur("blanc et maron")
            ->setDescription("Bureau d'engle 2 en 1 : Pratique, fonction bureau et rangement grâce à son sur meuble
             Grande capacité de rangement : 1 porte, 1 tiroir, niches et étagère, 
             Astucieux : un passe-câbles pour votre ordinateur et port USB-C")
            ->setPrixAchat(250)
            ->setPhoto("bureau_d_angle.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie51)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr12);

        // Produit 3
        $pr13 = new Produit();
        $pr13->setReference("REF013")
            ->setLibelle("bureau gaming")
            ->setDimenssion("150x42x83 cm")
            ->setCouleur("blanc et maron")
            ->setDescription("Plateau en forme pour accentuer l'immersion dans le jeu.
             Tablette incurvée supportant jusqu'à 3 écrans,
             Kit LED RGB 150 cm avec télécommande")
            ->setPrixAchat(180)
            ->setPhoto("bureau_gaming.jpg")
            ->setActif(true)
            ->setQuantiteStock(40)
            ->setStockAlert(5)
            ->setCategorie($categorie51)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr13);
        // Produit 4
        $pr14 = new Produit();
        $pr14->setReference("REF014")
            ->setLibelle("Bureau et étagère")
            ->setDimenssion("120x50x144 cm")
            ->setCouleur("blanc et maron")
            ->setDescription("Bibliothèque pratique à portée de main
             L'étagère peut se positionner à droite ou à gauche")
            ->setPrixAchat(50)
            ->setPhoto("bureau_etagere.jpg")
            ->setActif(true)
            ->setQuantiteStock(45)
            ->setStockAlert(5)
            ->setCategorie($categorie51)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr14);
        // Produit 5
        $pr15 = new Produit();
        $pr15->setReference("REF015")
            ->setLibelle("bureau ZAPY")
            ->setDimenssion("160x60x145 cm")
            ->setCouleur("blanc")
            ->setDescription("Avec sa bibliothèque intégrée, le bureau ZAPY offre bien plus qu’un simple plan de travail. Ses étagères peuvent accueillir vos livres d’étude, vos dossiers, vos documents, vos petites affaires et des éléments décoratifs. Le bureau avec étagères ZAPY met à portée de main tout ce dont vous avez besoin pour travailler efficacement.")
            ->setPrixAchat(160)
            ->setPhoto("bureau_ZAPY.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie51)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr15);
        // Produit 6
        $pr16 = new Produit();
        $pr16->setReference("REF016")
            ->setLibelle("bureau MICKE")
            ->setDimenssion("100x100x142 cm")
            ->setCouleur("blanc")
            ->setDescription("Optimisez l'espace chez vous avec ce poste de travail d'angle. Beaucoup de rangements accessibles même quand le bureau est bien rangé. Et des petits plus : orifice pour câbles, tablettes réglables et tableau magnétique pour vos notes.")
            ->setPrixAchat(160)
            ->setPhoto("bureau_MICKE.jpg")
            ->setActif(true)
            ->setQuantiteStock(25)
            ->setStockAlert(5)
            ->setCategorie($categorie51)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr16);

        $categorie52 = new Categorie;
        $categorie52->setNomCategorie("Chaises");
        $categorie52->setPhoto("chaises.jpg");
        $categorie52->setParent($categorie5);
        $manager->persist($categorie52);
        //les produits de sous catégorie chaise
        // Produit 1
        $pr17 = new Produit();
        $pr17->setReference("REF017")
            ->setLibelle("chaise MILLBERGET")
            ->setDimenssion("70x60x128 cm")
            ->setCouleur("noir")
            ->setDescription("Le fauteuil pivotant MILLBERGET offre confort et fonctionnalité lorsque vous travaillez à votre bureau. Il est également élégant, de dimensions généreuses et se marie facilement au décor de votre salon ou de votre chambre.")
            ->setPrixAchat(80)
            ->setPhoto("chaise_MILLBERGET.jpg")
            ->setActif(true)
            ->setQuantiteStock(50)
            ->setStockAlert(5)
            ->setCategorie($categorie52)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr17);

        // Produit 2
        $pr18 = new Produit();
        $pr18->setReference("REF018")
            ->setLibelle("chaise JARVFJALLET")
            ->setDimenssion("68x68x140 cm")
            ->setCouleur("noir")
            ->setDescription("Cette chaise ergonomique dispose de nombreux avantages pour être confortablement installé et bien concentré, comme un dossier avec soutien lombaire réglable et une structure en maille pour rester au frais.")
            ->setPrixAchat(220)
            ->setPhoto("chaise_JARVFJALLET.jpg")
            ->setActif(true)
            ->setQuantiteStock(39)
            ->setStockAlert(5)
            ->setCategorie($categorie52)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr18);

        // Produit 3
        $pr19 = new Produit();
        $pr19->setReference("REF019")
            ->setLibelle("chaise HATTEFJALL")
            ->setDimenssion("68x60x114 cm")
            ->setCouleur("blanc")
            ->setDescription("Cette chaise ergonomique dispose de nombreuses fonctionnalités afin d'être assis confortablement, comme un mécanisme d'inclinaison synchronisé, qui permet de rester en mouvement même assis. Garantie 10 ans.")
            ->setPrixAchat(240)
            ->setPhoto("chaise_HATTEFJALL.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie52)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr19);

        // Produit 4
        $pr20 = new Produit();
        $pr20->setReference("REF020")
            ->setLibelle("chaise GRUPPSPEL")
            ->setDimenssion("68x68x114 cm")
            ->setCouleur("blanc")
            ->setDescription("Un fauteuil de gamer qui trouve facilement sa place dans la pièce. Il dispose de nombreuses fonctions pratiques qui permettent de régler le dossier, l'assise, l'angle d'inclinaison, les accoudoirs et le repose-tête pour être parfaitement installé.")
            ->setPrixAchat(220)
            ->setPhoto("chaise_GRUPPSPEL.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie52)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr20);

        // Produit 5
        $pr21 = new Produit();
        $pr21->setReference("REF021")
            ->setLibelle("chaise_TOSSBERG")
            ->setDimenssion("67x67x100 cm")
            ->setCouleur("blanc")
            ->setDescription("Chaise pivotante aux formes arrondies avec assise rembourrée. Revêtement en tissu résistant qui lui permet de trouver facilement sa place dans de nombreuses pièces. Les roulettes permettent de la déplacer facilement.")
            ->setPrixAchat(180)
            ->setPhoto("chaise_TOSSBERG.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie52)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr21);

        // Produit 6
        $pr22 = new Produit();
        $pr22->setReference("REF022")
            ->setLibelle("Chaise STYRSPEL")
            ->setDimenssion("60x60x145 cm")
            ->setCouleur("mauve")
            ->setDescription("Le fauteuil gamer STYRSPEL vous permet de donner le meilleur de vous-même lors de vos parties de jeux vidéos. Appuie-tête, soutien lombaire et accoudoirs réglables comme la hauteur et la profondeur d'assise ; le matériau en maille évite d'avoir chaud.")
            ->setPrixAchat(220)
            ->setPhoto("chaise_STYRSPEL.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie52)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr22);


        $categorie53 = new Categorie;
        $categorie53->setNomCategorie("Etagères");
        $categorie53->setPhoto("etageres.jpg");
        $categorie53->setParent($categorie5);
        $manager->persist($categorie53);
        //les produits de sous catégorie etagére
        // Produit 1
        $pr23 = new Produit();
        $pr23->setReference("REF023")
            ->setLibelle("Etagere BEKANT")
            ->setDimenssion("120x134x45 cm")
            ->setCouleur("blanc")
            ->setDescription("
              Rangement polyvalent spacieux à utiliser comme séparateur de pièce, tableau d'affichage et porte-manteau. Créez une pièce dans le pièce ; vous pourrez afficher des papiers importants à l'aide d'aimants et suspendre une veste à un crochet.")
            ->setPrixAchat(260)
            ->setPhoto("etagere_BEKANT.jpg")
            ->setActif(true)
            ->setQuantiteStock(50)
            ->setStockAlert(5)
            ->setCategorie($categorie53)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr23);

        // Produit 2
        $pr24 = new Produit();
        $pr24->setReference("REF024")
            ->setLibelle("Etagère SKRUVBY")
            ->setDimenssion("130x140x40 cm")
            ->setCouleur("blanc et maron")
            ->setDescription("La série SKRUVBY offre un aspect traditionnel avec des rangements indépendants qui peuvent être coordonnées. Cette solution adaptable et pratique convient aussi bien pour le salon que pour la salle à manger.")
            ->setPrixAchat(120)
            ->setPhoto("etagere_SKRUVBY.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie53)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr24);

        // Produit 3
        $pr25 = new Produit();
        $pr25->setReference("REF025")
            ->setLibelle("Etagère KALLAX")
            ->setDimenssion("160x60x145 cm")
            ->setCouleur("maron")
            ->setDescription("Utilisez les pièces de raccordement INLÄGG pour fixer un plateau et des pieds à une étagère KALLAX. Ou bien choisissez une combinaison déjà existante composée d'un simple bureau avec beaucoup de rangements.")
            ->setPrixAchat(210)
            ->setPhoto("etagere_KALLAX.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie53)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr25);

        // Produit 4
        $pr26 = new Produit();
        $pr26->setReference("REF016")
            ->setLibelle("Etagère VITTSJO")
            ->setDimenssion("202x36x175 cm")
            ->setCouleur("noir")
            ->setDescription("Un rangement léger et aéré pour vos affaires de travail et de loisirs. Cette combinaison avec un plan de travail et un rangement pour ordinateur portable transforme n'importe quelle petite pièce en un lieu de travail très fonctionnel.")
            ->setPrixAchat(140)
            ->setPhoto("etagere_VITTSJO.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie53)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr26);

        // Produit 5
        $pr27 = new Produit();
        $pr27->setReference("REF027")
            ->setLibelle("Etagère BESTA")
            ->setDimenssion("120x42x202 cm")
            ->setCouleur("blanc")
            ->setDescription("Le désordre est facilement caché, les plus beaux objets sont exposés sur des tablettes ouvertes. Un rangement pratique et décoratif, qui permet d'exprimer votre personnalité.")
            ->setPrixAchat(260)
            ->setPhoto("etagere_BESTA.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie53)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr27);

        // Produit 6
        $pr28 = new Produit();
        $pr28->setReference("REF028")
            ->setLibelle("Etagère PLATSA")
            ->setDimenssion("300x42x281 cm")
            ->setCouleur("blanc")
            ->setDescription("La série PLATSA propose des rangements pour les endroits les plus compliqués à aménager. Vous pouvez créer un rangement haut ou bas et le placer sous un plafond mansardé ou le long d'un mur. À compléter avec des portes et des organiseurs internes.")
            ->setPrixAchat(280)
            ->setPhoto("etagere_PLATSA.jpg")
            ->setActif(true)
            ->setQuantiteStock(25)
            ->setStockAlert(5)
            ->setCategorie($categorie53)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr28);



        $categorie54 = new Categorie;
        $categorie54->setNomCategorie("Accessoires_de_Bureau");
        $categorie54->setPhoto("accessoires.jpg");
        $categorie54->setParent($categorie5);
        $manager->persist($categorie54);
        //les produits de sous catégorie Accessoires de Bureau
        // Produit 1
        $pr29 = new Produit();
        $pr29->setReference("REF029")
            ->setLibelle(" Rangement de Bureau")
            ->setDimenssion("12x14x22cm  cm")
            ->setCouleur("noir")
            ->setDescription("Économie d'espace de bricolage: L'organisateur de tiroir de bureau est facile à garder les stylos, les règles, les ciseaux, les livres, les fichiers, les trombones, etc. tout en un seul endroit; également bon pour organiser les maquillages et les petits articles ménagers.")
            ->setPrixAchat(10)
            ->setPhoto("rangement_Bureau.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie54)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr29);
        // Produit 2
        $pr30 = new Produit();
        $pr30->setReference("REF030")
            ->setLibelle("Lampe de Bureau LED")
            ->setDimenssion("15x14x22cm cm")
            ->setCouleur("blanc")
            ->setDescription("La lampe de bureau led réglable a 3 niveaux de luminosité et 5 modes de couleur (jaune chaud -3000k, chaud -3500k, naturel - 4000k, blanc naturel -4500k et froid -5000k). Une variété de couleurs et de luminosité pour répondre à diverses exigences. La lampe de bureau led a une surface lumineuse plus longue, une lumière uniforme, pas d'éblouissement, pas de stroboscope, réduire efficacement les dommages causés par la lumière bleue")
            ->setPrixAchat(10)
            ->setPhoto("lampe_bureau.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie54)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr30);



        // Produit 3
        $pr31 = new Produit();
        $pr31->setReference("REF031")
            ->setLibelle("Kit nettoyage Clavier")
            ->setDimenssion("6x6x14cm")
            ->setCouleur("blanc et orange")
            ->setDescription("kit de nettoyage électronique multifonctionnel contient un ensemble complet de différents outils pour nettoyer vos appareils électroniques, vous offrant une meilleure expérience de nettoyage.")
            ->setPrixAchat(8)
            ->setPhoto("kit_nettoyage_clavier.jpg")
            ->setActif(true)
            ->setQuantiteStock(60)
            ->setStockAlert(5)
            ->setCategorie($categorie54)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr31);

        // Produit 4
        $pr32 = new Produit();
        $pr32->setReference("REF032")
            ->setLibelle("Tapis de Bureau")
            ->setDimenssion("160x60x145 cm")
            ->setCouleur("blanc")
            ->setDescription("PROTÉGER VOTRE BUREAU -- Fait en cuir PU durable, qui protège votre bureau contre les rayures, les taches, les renversements, la chaleur et les éraflures, en fournissant à votre bureau une atmosphère moderne et professionnelle lorsque vous le mettez sur votre bureau. Sa surface lisse vous fera aimer écrire, taper et naviguer. Il est parfait pour le bureau et la maison.")
            ->setPrixAchat(8.5)
            ->setPhoto("tapis_bureau.jpg")
            ->setActif(true)
            ->setQuantiteStock(70)
            ->setStockAlert(10)
            ->setCategorie($categorie54)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr32);

        // Produit 5
        $pr33 = new Produit();
        $pr33->setReference("REF033")
            ->setLibelle("Rangement Courriers")
            ->setDimenssion("30x30x50 cm")
            ->setCouleur("noir")
            ->setDescription("Plateau de bureau solide avec tiroirs, idéal pour le rangement de documents, conçu avec un support à 3 tiroirs, fabriqué en plastique de haute qualité et en maille métallique, aspect élégant, organisateur durable pour les documents et plus encore")
            ->setPrixAchat(6)
            ->setPhoto("rangement_courriers_.jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie54)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr33);

        // Produit 6
        $pr34 = new Produit();
        $pr34->setReference("REF034")
            ->setLibelle("Support Tablette")
            ->setDimenssion("160x60x145 cm")
            ->setCouleur("argent")
            ->setDescription("Support Tablette Bureau Réglable Repose Tablette Pliable Porte Téléphone en Aluminium Compatible avec iPhone 15 Plus Pro Max iPad Pro 12,9 10,9 Air 2022 iPad Mini Galaxy Tab A8.")
            ->setPrixAchat(12)
            ->setPhoto("support_tablette.jpg")
            ->setActif(true)
            ->setQuantiteStock(80)
            ->setStockAlert(10)
            ->setCategorie($categorie54)
            ->setFournisseur($fournisseur5);
        $manager->persist($pr34);

        /**Catégorie Salle de bain */
        $categorie6 = new Categorie();
        $categorie6->setNomCategorie("Salle_de_Bain");
        $categorie6->setPhoto("salle_de_bain.jpg");
        $manager->persist($categorie6);

        /**Sous Catégories Salle de bain */

        $categorie61 = new Categorie;
        $categorie61->setNomCategorie("Armoirs");
        $categorie61->setPhoto("armoires.jpg");
        $categorie61->setParent($categorie6);
        $manager->persist($categorie61);

        //les produits de la sous catégorie armoirs
        // Produit 1
        $pr89 = new Produit();
        $pr89 ->setReference("REF089")
            ->setLibelle("")
            ->setDimenssion("60x120x8 cm")
            ->setCouleur("blanc")
            ->setDescription("")
            ->setPrixAchat(40)
            ->setPhoto(".jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie61)
            ->setFournisseur($fournisseur2);
        $manager->persist($pr89);

         // Produit 2
         $pr90 = new Produit();
         $pr90 ->setReference("REF090")
             ->setLibelle("")
             ->setDimenssion("60x120x8 cm")
             ->setCouleur("blanc")
             ->setDescription("")
             ->setPrixAchat(40)
             ->setPhoto(".jpg")
             ->setActif(true)
             ->setQuantiteStock(30)
             ->setStockAlert(5)
             ->setCategorie($categorie61)
             ->setFournisseur($fournisseur2);
         $manager->persist($pr90);

          // Produit 3
        $pr89 = new Produit();
        $pr89 ->setReference("REF089")
            ->setLibelle("")
            ->setDimenssion("60x120x8 cm")
            ->setCoul8eur("blanc")
            ->setDescription("")
            ->setPrixAchat(40)
            ->setPhoto(".jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie61)
            ->setFournisseur($fournisseur2);
        $manager->persist($pr89);

         // Produit 4
         $pr89 = new Produit();
         $pr89 ->setReference("REF089")
             ->setLibelle("")
             ->setDimenssion("60x120x8 cm")
             ->setCouleur("blanc")
             ->setDescription("")
             ->setPrixAchat(40)
             ->setPhoto(".jpg")
             ->setActif(true)
             ->setQuantiteStock(30)
             ->setStockAlert(5)
             ->setCategorie($categorie61)
             ->setFournisseur($fournisseur2);
         $manager->persist($pr89);

          // Produit 5
        $pr89 = new Produit();
        $pr89 ->setReference("REF089")
            ->setLibelle("")
            ->setDimenssion("60x120x8 cm")
            ->setCouleur("blanc")
            ->setDescription("")
            ->setPrixAchat(40)
            ->setPhoto(".jpg")
            ->setActif(true)
            ->setQuantiteStock(30)
            ->setStockAlert(5)
            ->setCategorie($categorie61)
            ->setFournisseur($fournisseur2);
        $manager->persist($pr89);

         // Produit 6
         $pr89 = new Produit();
         $pr89 ->setReference("REF089")
             ->setLibelle("")
             ->setDimenssion("60x120x8 cm")
             ->setCouleur("blanc")
             ->setDescription("")
             ->setPrixAchat(40)
             ->setPhoto(".jpg")
             ->setActif(true)
             ->setQuantiteStock(30)
             ->setStockAlert(5)
             ->setCategorie($categorie61)
             ->setFournisseur($fournisseur2);
         $manager->persist($pr89);


        $categorie62 = new Categorie;
        $categorie62->setNomCategorie("Meubles_Lavabos");
        $categorie62->setPhoto("meubles_lavabos.jpg");
        $categorie62->setParent($categorie6);
        $manager->persist($categorie62);

        $categorie63 = new Categorie;
        $categorie63->setNomCategorie("Rangements");
        $categorie63->setPhoto("rangement.jpg");
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
        $em1->setPoste("Directeur des ventes")
            ->setUtilisateur($user6);
        $manager->persist($em1);

        // Employé 2
        $em2 = new Employe($user2);
        $em2->setPoste("Service Commercial")
            ->setUtilisateur($user7);
        $manager->persist($em2);

        // Employé 3
        $em3 = new Employe();
        $em3->setPoste("Service Commercial")
            ->setUtilisateur($user8);
        $manager->persist($em3);

        //*************************************************************Ajouter des Clients
        // Client 1
        $client1 = new Client();
        $client1->setReferenceClient("C000001")
            ->setType("Particulier")
            ->setCoefficient(1.5)
            ->setReduction(0)
            ->setEmploye($em2)
            ->setUtilisateur($user2);
        $manager->persist($client1);

        // Client 2
        $client2 = new Client();
        $client2->setReferenceClient("C000002")
            ->setType("Particulier")
            ->setCoefficient(1.5)
            ->setReduction(0)
            ->setEmploye($em2)
            ->setUtilisateur($user3);
        $manager->persist($client2);

        // Client 3
        $client3 = new Client();
        $client3->setReferenceClient("C000003")
            ->setType("Particulier")
            ->setCoefficient(1.5)
            ->setReduction(0)
            ->setEmploye($em2)
            ->setUtilisateur($user4);
        $manager->persist($client3);

        // Client 4
        $client4 = new Client();
        $client4->setReferenceClient("P000001")
            ->setType("Particulier")
            ->setCoefficient(1.3)
            ->setReduction(0.1)
            ->setEmploye($em3)
            ->setUtilisateur($user5);
        $manager->persist($client4);

        // Client 5
        $client5 = new Client();
        $client5->setReferenceClient("P000002")
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
