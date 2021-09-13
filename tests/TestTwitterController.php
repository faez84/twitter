<?php

namespace App\Tests;
use App\Controller\TwitterController;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\HttpFoundation\Response;

/**
 * Created by PhpStorm.
 * User: Benutzer
 * Date: 9/11/2021
 * Time: 10:14 AM
 */
class TestTwitterController extends BaseWebTestCase
{

    public $twitter;


    public function setUp(): void
    {
        parent::setUp();

        $this->twitter = self::$container->get(TwitterController::class);

    }
    public function testMain()
    {
        $this->client->request('Get', '/twitter');
        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        $h = json_decode($this->client->getResponse()->getContent(), true);
        $this->assertEquals('first', $h[0]['body']);
    }

    public function testInsert()
    {
        $data = ['body' => 'testControllerTwitter'];
        $this->client->request('POST', '/settwitter', $data);
        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
    }

//    public function testDelete()
//    {
//        $data = ['body' => 'testControllerTwitter'];
//        $this->client->request('POST', '/settwitter', $data);
//
//        $data = ['id' => ''];
//        $this->client->request('POST', '/deltwitter', $data);
//        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
//
//    }
}