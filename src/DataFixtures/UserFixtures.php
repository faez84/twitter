<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
     private $passwordHasher;

     public function __construct(UserPasswordHasherInterface $passwordHasher)
     {
         $this->passwordHasher = $passwordHasher;
     }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
         $user->setEmail('faez@gmail.com');

                $user->setPassword($this->passwordHasher->hashPassword(
                             $user,
            '$2y$13$aFvEeicyufjqJH07rVpyMejIXPREepxXTYvAr8ABFBv7ydL9uqRJq'
                    ));
        $manager->persist($user);
        $manager->flush();
    }
}
