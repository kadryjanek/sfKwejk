<?php

namespace Kwejk\MemsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MemsControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{slug}');
    }

}
