<?php

namespace App\DataFixtures;

use App\Entity\Hotel;
use App\Entity\Manager;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;
use Faker\Factory;

class HotelFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create();

        $hotel = new Hotel();

        $hotel->setHotelName($faker->word());
        $hotel->setHotelCity($faker->city());
        $hotel->setHotelDescription($faker->text());
        $hotel->setHotelSlug($faker->slug());
        $hotel->setHotelAddress($faker->address());

        $hotel->setManager($this->getReference(ManagerFixtures::MANAGER_REFERENCE));


        $manager->persist($hotel);

        $manager->flush();

      

    }
}