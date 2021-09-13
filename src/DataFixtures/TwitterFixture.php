<?php
/**
 * Created by PhpStorm.
 * User: Benutzer
 * Date: 9/11/2021
 * Time: 11:23 AM
 */

namespace App\DataFixtures;


use App\Entity\Twitt;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TwitterFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $twitt = new Twitt();
        $twitt->setBody('first');
        $manager->persist($twitt);

        $manager->flush();
    }

}