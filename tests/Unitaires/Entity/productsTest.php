<?php

namespace App\Tests\Unitaires\Entity;

use App\Entity\Categorie;

use App\Entity\Produit;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class productsTest extends KernelTestCase
{
    //fonction pourrécupérer l'entité
    public function getEntity():Produit{
        return(new Produit())
        ->setReference("12345678jjuuuuuu")
        ->setLibelle("produit")
        ->setDimenssion("122x49x77 cm")
        ->setCouleur("chêne/noir")
        ->setDescription("test de déscription")
        ->setPrixAchat(350)
        ->setPhoto("OXMYREN.jpg")
        ->setActif(true)
        ->setQuantiteStock(30)
        ->setStockAlert(5);
    
    }

    public function assetHasError(Produit $product, $number=0 ){
    // validation
    self::bootKernel();
    // récupération depuis le container, le validator
    $container = static::getContainer(); 
  
    $errors= $container->get('validator')->validate($product);
  
    $messages = [];
    /**
     * @var ConstraintViolation $error
     */
    foreach ($errors as $error) {
        $messages[] = $error->getPropertyPath() . ' => ' . $error->getMessage();
    }
    // on s'attend à ne pas avoir d'erreur
    $this->assertCount($number, $errors, implode(',', $messages));
    }

   
    public function testValid()
    {
        $this->assetHasError($this->getEntity(),0) ;
    }
     public function testInvalid(){
        $this->assetHasError($this->getEntity()->setLibelle(4555),1);
        
     }
     public function testBlank(){
        $this->assetHasError($this->getEntity()->setLibelle(""),0);
     }
    public function testCountCategories(): void
    {
        $kernel = self::bootKernel();

        $em = $kernel->getContainer()->get('doctrine')->getManager();

        $repo = $em->getRepository(Categorie::class);

        $liste = $repo->findBy([ "parent" => null ]);
        

        $this->assertTrue(count($liste)===8);
    }

    public function testSomething(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        // $routerService = static::getContainer()->get('router');
        // $myCustomService = static::getContainer()->get(CustomService::class);
    }
}
