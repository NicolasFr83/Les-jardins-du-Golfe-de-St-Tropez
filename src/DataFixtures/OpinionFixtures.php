<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Opinion;
use App\DataFixtures\EnterpriseFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class OpinionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <=10; $i++) {
            $Opinion = new Opinion();
            $Opinion->setName($faker->text(15))
                ->setAvis($faker->text(200))
                ->setScore($faker->numberBetween(1,5))
                ->setIsModerated(false)
                ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE_REFERENCE));

            $manager->persist($Opinion);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            EnterpriseFixtures::class,
        ];
    }
}
