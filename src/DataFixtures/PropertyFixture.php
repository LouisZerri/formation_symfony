<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for($i = 0; $i < 100; $i++)
        {
            $faker = Factory::create('fr_FR');

            $property = new Property();
            $property
                ->setTitle($faker->words(3, true))
                ->setDescription($faker->sentence(3, true))
                ->setSurface($faker->numberBetween(20, 350))
                ->setRooms($faker->numberBetween(2, 10))
                ->setBedrooms($faker->numberBetween(1, 9))
                ->setPrice($faker->numberBetween(100000, 1000000))
                ->setHeat($faker->numberBetween(0, count(Property::HEAT) - 1))
                ->setCity($faker->city)
                ->setAddress($faker->address)
                ->setPostalCode($faker->postcode)
                ->setSold(false)
                ->setFloor($faker->numberBetween(0, 15));

            $manager->persist($property);
        }

        $manager->flush();
    }
}
