<?php

namespace App\DataFixtures;

use Faker;
use Faker\Factory;
use App\Entity\Manager;
use App\Entity\Hotel;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ManagerFixtures extends Fixture implements DependentFixtureInterface
{
    public const MANAGER_REFERENCE = 'manager';

    private $passwordHasher;
        
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create();

        $user = new Manager();

        $user->setEmail('manager@test.com');
        $user->setRoles(["ROLE_USER"]);
        $user->setmanagerFirstName($faker->firstName());
        $user->setmanagerLastName($faker->lastName());
        $user->setPassword($this->passwordHasher->hashPassword(
                $user,
                "manager123"));

        //$password = $this->encoder->encodePassword($user, 'password');
        //$user->setPassword($password);

       
        $manager->persist($user);
        $this->addReference(self::MANAGER_REFERENCE, $user);
        $manager->flush();

        
        
    }

    public function getDependencies()
    {
        return [
            HotelFixtures::class,
        ];

    }
}