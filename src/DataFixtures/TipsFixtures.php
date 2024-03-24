<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Tips;
use Faker;

class TipsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $tips = new Tips();
        $tips->setName($faker->text(10))
            ->setDescription($faker->text(50));

            $manager->persist($tips);

        $manager->flush();
    }
}
