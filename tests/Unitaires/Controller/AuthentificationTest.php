<?php

namespace App\Tests\Unitaires\Controller;

use Symfony\Component\Panther\PantherTestCase;

class AuthentificationTest extends PantherTestCase
{
    public function testAuthentification(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton("Me connecter")->form();
        $form['email'] = 'bily-f@hotmail.fr';
        $form['password'] = '123456'; 
        sleep(5);
        $crawler = $client->submit($form);

        sleep(5);

        // $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('body','Nos Catégories');
    }
}
