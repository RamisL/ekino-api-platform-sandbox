<?php

namespace App\DataFixtures;

use App\Entity\Serie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class LoadSerieData extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        // create 20 characters! Bam!
        for ($i = 0; $i < 20; $i++) {
            $serie = new Serie();
            $serie->setTitle($faker->title());
            $serie->setDescription($faker->sentence($nbWords = 6, $variableNbWords = true));
            $serie->setStartYear($faker->numberBetween(1920, 2019));
            $serie->setEndYear($faker->numberBetween(1920, 2019));




            $manager->persist($serie);
        }


        $manager->flush();
    }

}