<?php

namespace Kwejk\MemsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MemsControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();
        $client->followRedirects();
        
        $crawler = $client->request('GET', '/');
        
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Strona główna")')->count()
        );
        
        $link = $crawler->filter('a:contains("Dodaj mema")')->eq(0)->link();
        
        $crawler = $client->click($link);
        
        // Panel logowania
        $this->assertEquals(
            1,
            $crawler->filter('html:contains("Panel logowania")')->count()
        );
        
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{slug}');
    }

}
