<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\HomePage;
use Faker;

class HomePageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $homePage = new HomePage();
        $homePage->setTitle($faker->text(10))
            ->setPresentationText($faker->text(50));

            $manager->persist($homePage);

        $manager->flush();
    }
}
