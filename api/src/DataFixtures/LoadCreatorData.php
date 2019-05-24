<?php

namespace App\DataFixtures;

use App\Entity\Creator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class LoadCreatorData extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        // create 20 characters! Bam!
        for ($i = 0; $i < 20; $i++) {
            $creator = new Creator();
            $creator->setFirstName($faker->name());
            $creator->setLastname($faker->name());
            $creator->setFullname($faker->name());
            $creator->setResourceURI($faker->url());



            $manager->persist($creator);
        }


        $manager->flush();
    }

}