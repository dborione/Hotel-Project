<?php

namespace App\DataFixtures;

use Faker;
use Faker\Factory;
use App\Entity\Manager;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        
        $faker = Faker\Factory::create();

        $user = new Manager();

        $user->setEmail('user@test.com')
             ->setmanagerFirstName($faker->firstName())
             ->setmanagerLastName($faker->lastName());
        
        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);

        $manager->flush();
    }
}