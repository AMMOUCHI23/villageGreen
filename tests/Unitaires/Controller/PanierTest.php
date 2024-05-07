<?php

namespace App\Tests\Unitaires\Controller;

use Symfony\Component\Panther\PantherTestCase;

class PanierTest extends PantherTestCase
{
    public function testValidationPanier(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/');

        sleep(2);
        // Sélectionner et cliquer sur une catégorie
        $link = $crawler->selectLink("Séjour")->link();
        $crawler = $client->click($link);

        sleep(2);

       //Choisir un produit et l'ajouter au panier
       
        $link = $crawler->selectLink("Ajouter au panier")->link();
        $crawler = $client->click($link);

        // Attendre que le bouton valider mon panier s'affiche 
        // $client->waitFor('.btn.btn-primary.mt-3');
        sleep(2);
        
        // clicker pour valider le panier
        
        $link=$crawler->selectLink('Valider mon panier')->link();
        $crawler = $client->click($link);

        $this->assertSelectorTextContains('h2','Connexion à mon compte');
        
        sleep(2);
    }
}
