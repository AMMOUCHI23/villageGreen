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
        $form['email'] = 'bily-f@hotmail.fr'; // Assurez-vous que le nom du champ email est correct
        $form['password'] = '123456'; // Assurez-vous que le nom du champ mot de passe est correct
        $crawler = $client->submit($form);
        sleep(1);

        $this->assertResponseIsSuccessful();
    }
}
