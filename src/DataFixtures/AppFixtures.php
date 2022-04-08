<?php

namespace App\DataFixtures;

use Faker;
use Faker\Factory;
use App\Entity\Manager;
use App\Entity\Admin;
use App\Entity\Hotel;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{
    private $passwordHasher;
        
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        $hotelmanager = new Manager();
        $hotel = new Hotel();
        $admin = new Admin();


        $hotel->setHotelName($faker->word());
        $hotel->setHotelCity($faker->city());
        $hotel->setHotelDescription($faker->text());
        $hotel->setHotelSlug($faker->slug());
        $hotel->setHotelAddress($faker->address());
        $hotel->setManager(
            $hotelmanager->setEmail('manager@test.com'),
            $hotelmanager->setRoles(["ROLE_USER"]),
            $hotelmanager->setmanagerFirstName($faker->firstName()),
            $hotelmanager->setmanagerLastName($faker->lastName()),
            $hotelmanager->setPassword($this->passwordHasher->hashPassword(
                $hotelmanager,
                "manager123")),
            $hotelmanager->setAdmin(
                $admin->setEmail('admin@test.com'),
                $admin->setRoles(["ROLE_ADMIN"]),
                $admin->setPassword($this->passwordHasher->hashPassword(
                    $admin,
                    "admin123")),
            )
        );
              
        $manager->persist($hotel);
        $manager->persist($hotelmanager);
        $manager->persist($admin);
        $manager->flush();
        
    }
}               