<?php

namespace App\Tests\Unitaires\Entity;

use App\Entity\Categorie;
use App\Entity\Fournisseur;
use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class productsTest extends KernelTestCase
{
    public function testValid()
    {
        
        $product1 = (new Produit())
        ->setReference("12345678jjuuuuuu")
        ->setLibelle(1.2)
        ->setDimenssion("122x49x77 cm")
        ->setCouleur("chêne/noir")
        ->setDescription("test de déscription")
        ->setPrixAchat(350)
        ->setPhoto("OXMYREN.jpg")
        ->setActif(true)
        ->setQuantiteStock(30)
        ->setStockAlert(5);
    
        // validation
        self::bootKernel();
        // récupération depuis le container, le validator
        $container = static::getContainer(); 
      
        $error= $container->get('validator')->validate($product1);
      
        // on s'attend à ne pas avoir d'erreur
        $this->assertCount(0, $error);
    }
    
    public function testCountCategories(): void
    {
        $kernel = self::bootKernel();

        $em = $kernel->getContainer()->get('doctrine')->getManager();

        $repo = $em->getRepository(Categorie::class);

        $liste = $repo->findBy([ "parent" => null ]);
        

        $this->assertTrue(count($liste)===8);
    }

    // public function testSomething(): void
    // {
    //     $kernel = self::bootKernel();

    //     $this->assertSame('test', $kernel->getEnvironment());
    //     // $routerService = static::getContainer()->get('router');
    //     // $myCustomService = static::getContainer()->get(CustomService::class);
    // }
}
