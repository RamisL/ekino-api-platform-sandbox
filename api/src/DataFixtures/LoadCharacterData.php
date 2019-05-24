<?php

namespace App\DataFixtures;

use App\Entity\Character;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class LoadCharacterData extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        // create 20 characters! Bam!
        for ($i = 0; $i < 20; $i++) {
            $character = new Character();
            $character->setName($faker->name());
            $character->setDescription($faker->sentence($nbWords = 6, $variableNbWords = true));

            $manager->persist($character);
        }


        $manager->flush();
    }

}
