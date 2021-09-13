<?php
/**
 * Created by PhpStorm.
 * User: Benutzer
 * Date: 9/11/2021
 * Time: 2:42 PM
 */

namespace App\Tests\Model;


use App\Model\Twitt;
use App\Tests\BaseWebTestCase;

class TestTwitt extends BaseWebTestCase
{
    /** @var  Twitt */
    public $twitt;

    public function testSelect()
    {
        $twitt = $this->twitt->select();
        $this->assertEquals($twitt[0]['body'], 'first');
    }
        public function setUp(): void
    {
        parent::setUp();

        $this->twitt = self::$container->get(Twitt::class);

    }

    public function testInsert()
    {
        $data = [
            'body' => 'testtwitt'
        ];

        $this->assertTrue($this->twitt->insert($data));
    }

    public function testDelete()
    {
        $twitts = $this->twitt->select();
        $id = $twitts[0]['id'];
        $this->assertTrue($this->twitt->delete($id));
    }
}