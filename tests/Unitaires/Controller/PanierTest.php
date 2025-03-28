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

        // Choisir un produit et l'ajouter au panier
        $link = $crawler->selectLink("Ajouter au panier")->link();
        $crawler = $client->click($link);

        sleep(2);

        // Attendre que le bouton "Valider mon panier" s'affiche et cliquer
        $client->waitFor('.btn.btn-primary.mt-3');
        $link = $crawler->selectLink('Valider mon panier')->link();
        $crawler = $client->click($link);

        sleep(2);

        // Se connecter pour valider la commande
        $form = $crawler->selectButton('Me connecter')->form();
        $form['email'] = 'bily-f@hotmail.fr';
        $form['password'] = '123456';
        $crawler = $client->submit($form);

        sleep(5);
   

        // Remplir et valider le formulaire de la commande
        $form = $crawler->selectButton('Payer ma commande')->form();
        $form['commande_form[adresse_livraison]'] = '13 rue Charles August';
        $form['commande_form[cp_livraison]'] = '80000';
        $form['commande_form[ville_livraison]'] = 'Amiens';
        $form['commande_form[adresse_facturation]'] = '13 rue Charles August';
        $form['commande_form[cp_facturation]'] = '80000';
        $form['commande_form[ville_facturation]'] = 'Amiens';
        sleep(2);
        $crawler = $client->submit($form);
        sleep(2);

        // Vérifier que la page catalogue est affichée
        $this->assertSelectorTextContains('h1', 'Nos Catégories');

       
    }
}
