<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ServicesPage;
use Faker;

class ServicesPageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $servicesPage = new ServicesPage();
        $servicesPage->setTitle($faker->text(10))
            ->setServicesPresentation($faker->text(50));

            $manager->persist($servicesPage);

        $manager->flush();
    }
}
