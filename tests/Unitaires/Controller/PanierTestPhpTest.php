<?php

namespace App\Tests\Unitaires\Controller;

use Symfony\Component\Panther\PantherTestCase;

class PanierTestPhpTest extends PantherTestCase
{
    public function testSomething(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/');
sleep(2);
// Sélectionner et cliquer sur le lien de la sous-catégorie
// $link = $crawler->selectLink("")->link()
// $crawler = $client->click($link);
// sleep(2);
        $this->assertSelectorTextContains('h1', 'Nos Catégories');
    }
}
