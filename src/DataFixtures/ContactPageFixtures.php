<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\ContactPage;

class ContactPageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $contactPage = new ContactPage();
        $contactPage->setTitle($faker->word())
            ->setPresentationText($faker->text(200));

            $manager->persist($contactPage);

        $manager->flush();
    }
}
