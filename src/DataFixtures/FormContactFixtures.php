<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\FormContact;
use Faker;

class FormContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <=10; $i++) {
            $formContact = new FormContact();
            $formContact->setName($faker->lastName())
                ->setFirstName($faker->firstName())
                ->setEmail($faker->email())
                ->setPhoneNumber($faker->phoneNumber())
                ->setSubject($faker->text(5))
                ->setMessage($faker->text(200));

            $manager->persist($formContact);
        }
        $manager->flush();
    }
}
