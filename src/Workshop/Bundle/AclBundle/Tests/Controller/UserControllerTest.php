<?php

namespace Workshop\Bundle\AclBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testLogin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

    public function testRole1()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/role1');
    }

    public function testRole2()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/role2');
    }

    public function testRole3()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/role3');
    }

}
