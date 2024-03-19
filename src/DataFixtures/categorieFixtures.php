<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class categorieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {   
        /*Catégorie Séjour */
        $categorie1 = new Categorie();
         $categorie1-> setNomCategorie("Séjour");
         $categorie1-> setPhoto("photo_sejour");
         $manager->persist($categorie1);
         
         /*Sous Catégories Séjours */
         $categorie11 = new Categorie;
         $categorie11-> setNomCategorie("Buffets");
         $categorie11-> setPhoto("photo_b1");
         $categorie11-> setParent($categorie1);
         $manager->persist($categorie11);

         $categorie12 = new Categorie;
         $categorie12-> setNomCategorie("Canapés");
         $categorie12-> setPhoto("photo_cp");
         $categorie12-> setParent($categorie1);
         $manager->persist($categorie12);

         $categorie13 = new Categorie;
         $categorie13-> setNomCategorie("Chaises");
         $categorie13-> setPhoto("photo_ch");
         $categorie13-> setParent($categorie1);
         $manager->persist($categorie13);

         $categorie14 = new Categorie;
         $categorie14-> setNomCategorie("Décorations");
         $categorie14-> setPhoto("photo_dc");
         $categorie14-> setParent($categorie1);
         $manager->persist($categorie14);

         $categorie15= new Categorie;
         $categorie15-> setNomCategorie("MeubleS TV");
         $categorie15-> setPhoto("MeubleS TV");
         $categorie15-> setParent($categorie1);
         $manager->persist($categorie15);

         $categorie16 = new Categorie;
         $categorie16-> setNomCategorie("Tapis");
         $categorie16-> setPhoto("photo_tp");
         $categorie16-> setParent($categorie1);
         $manager->persist($categorie16);


        /**Catégorie Cuisine */
         $categorie2 = new Categorie();
         $categorie2-> setNomCategorie("Cuisine");
         $categorie2-> setPhoto("photo_cuisine");
         $manager->persist($categorie2);
         
         /**Sous catégories cuisine */
         $categorie21 = new Categorie;
         $categorie21-> setNomCategorie("Buffets");
         $categorie21-> setPhoto("photo_b1");
         $categorie21-> setParent($categorie2);
         $manager->persist($categorie21);

         $categorie22 = new Categorie;
         $categorie22-> setNomCategorie("Dessertes");
         $categorie22-> setPhoto("photo_cp");
         $categorie22-> setParent($categorie2);
         $manager->persist($categorie22);

         $categorie23 = new Categorie;
         $categorie23-> setNomCategorie("Etagères Murales");
         $categorie23-> setPhoto("photo_ch");
         $categorie23-> setParent($categorie2);
         $manager->persist($categorie23);

         $categorie24 = new Categorie;
         $categorie24-> setNomCategorie("Tables et Chaises");
         $categorie24-> setPhoto("photo_dc");
         $categorie24-> setParent($categorie2);
         $manager->persist($categorie24);

        /**Catégorie chambre adulte */
         $categorie3 = new Categorie();
         $categorie3-> setNomCategorie("Chambre Adulte");
         $categorie3-> setPhoto("photo_Chambre_adulte");
         $manager->persist($categorie3);

         /**Sous categories chambre adulte */
         $categorie31 = new Categorie;
         $categorie31-> setNomCategorie("Armoires");
         $categorie31-> setPhoto("photo_b1");
         $categorie31-> setParent($categorie3);
         $manager->persist($categorie31);

         $categorie32 = new Categorie;
         $categorie32-> setNomCategorie("Commodes");
         $categorie32-> setPhoto("photo_cp");
         $categorie32-> setParent($categorie3);
         $manager->persist($categorie32);

         $categorie33 = new Categorie;
         $categorie33-> setNomCategorie("Lits");
         $categorie33-> setPhoto("photo_ch");
         $categorie33-> setParent($categorie3);
         $manager->persist($categorie33);

         $categorie34 = new Categorie;
         $categorie34-> setNomCategorie("Matelats");
         $categorie34-> setPhoto("photo_dc");
         $categorie34-> setParent($categorie3);
         $manager->persist($categorie34);


        /**Catégorie chambre enfant et bébé*/

         $categorie4 = new Categorie();
         $categorie4-> setNomCategorie("Chambre Enfant et Bébé");
         $categorie4-> setPhoto("photo_cambreen");
         $manager->persist($categorie4);

        /**Sous catégories chambre enfant */
        
        $categorie41 = new Categorie;
        $categorie41-> setNomCategorie("Armoires");
        $categorie41-> setPhoto("photo_b1");
        $categorie41-> setParent($categorie4);
        $manager->persist($categorie41);

        $categorie42 = new Categorie;
        $categorie42-> setNomCategorie("Commodes à langer");
        $categorie42-> setPhoto("photo_cp");
        $categorie42-> setParent($categorie4);
        $manager->persist($categorie42);

        $categorie43 = new Categorie;
        $categorie43-> setNomCategorie("Lits Bébé");
        $categorie43-> setPhoto("photo_ch");
        $categorie43-> setParent($categorie4);
        $manager->persist($categorie43);

        $categorie44 = new Categorie;
        $categorie44-> setNomCategorie("Lits Enfant");
        $categorie44-> setPhoto("photo_dc");
        $categorie44-> setParent($categorie4);
        $manager->persist($categorie44);

        $categorie45= new Categorie;
        $categorie45-> setNomCategorie("Matelats");
        $categorie45-> setPhoto("MeubleS TV");
        $categorie45-> setParent($categorie4);
        $manager->persist($categorie45);

        /**Ctégorie Bureau */
         $categorie5 = new Categorie();
         $categorie5-> setNomCategorie("Bureau");
         $categorie5-> setPhoto("photo_bureau");
         $manager->persist($categorie5);

         /**Sous catégories Bureau */
        
         $categorie51 = new Categorie;
         $categorie51-> setNomCategorie("Bureaux");
         $categorie51-> setPhoto("photo_b1");
         $categorie51-> setParent($categorie5);
         $manager->persist($categorie51);

         $categorie52 = new Categorie;
         $categorie52-> setNomCategorie("Chaises");
         $categorie52-> setPhoto("photo_cp");
         $categorie52-> setParent($categorie5);
         $manager->persist($categorie52);

         $categorie53 = new Categorie;
         $categorie53-> setNomCategorie("Etagères");
         $categorie53-> setPhoto("photo_ch");
         $categorie53-> setParent($categorie5);
         $manager->persist($categorie53);

         $categorie54 = new Categorie;
         $categorie54-> setNomCategorie("Accessoires de Bureau");
         $categorie54-> setPhoto("photo_dc");
         $categorie54-> setParent($categorie5);
         $manager->persist($categorie54);
         
         /**Catégorie Salle de bain */
         $categorie6 = new Categorie();
         $categorie6-> setNomCategorie("Salle de Bain");
         $categorie6-> setPhoto("photo_sdb");
         $manager->persist($categorie6);
         
         /**Sous Catégories Salle de bain */
         
         $categorie61 = new Categorie;
         $categorie61-> setNomCategorie("Armoirs");
         $categorie61-> setPhoto("photo_b1");
         $categorie61-> setParent($categorie6);
         $manager->persist($categorie61);

         $categorie62 = new Categorie;
         $categorie62-> setNomCategorie("Meubles Lavabos");
         $categorie62-> setPhoto("photo_cp");
         $categorie62-> setParent($categorie6);
         $manager->persist($categorie62);

         $categorie63 = new Categorie;
         $categorie63-> setNomCategorie("Rangements");
         $categorie63-> setPhoto("photo_ch");
         $categorie63-> setParent($categorie6);
         $manager->persist($categorie63);
         
         /**Catégorie Promos */
         $categorie7 = new Categorie();
         $categorie7-> setNomCategorie("Promos");
         $categorie7-> setPhoto("photo_promos");
         $manager->persist($categorie7);
         
          /**Catégorie Nouveautés */
         $categorie8 = new Categorie();
         $categorie8-> setNomCategorie("Nouveautés");
         $categorie8-> setPhoto("photo_nv");
         $manager->persist($categorie8);
         
         

        $manager->flush();
    }
}
