<?php

namespace App\DataFixtures;

use App\Entity\Comic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class LoadComicData extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        // create 20 characters! Bam!
        for ($i = 0; $i < 10; $i++) {
            $comic = new Comic();
            $comic->setTitle($faker->name());
            $comic->setDescription($faker->sentence($nbWords = 3));
            $comic->setFormat('html');
//            $comic->setFormat($faker->mimeType());
//            $comic->setPageCount($faker->numberBetween(80, 1650));
//            $comic->setResourceURI($faker->url());



            $manager->persist($comic);
        }


        $manager->flush();
    }

}