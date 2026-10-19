<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testContactFormDisplay(): void
    {
        $client = static::createClient();
        $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
    }

    public function testContactFormSubmission(): void
    {
        $client = static::createClient();
        $client->request('GET', '/contact');

        $client->submitForm('Envoyer', [
            'form[firstName]' => 'John',
            'form[name]' => 'Doe',
            'form[message]' => 'Test message',
        ]);

        $this->assertResponseRedirects('/');
    }
}
