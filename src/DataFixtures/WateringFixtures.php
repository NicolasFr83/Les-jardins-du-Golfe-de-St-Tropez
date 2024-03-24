<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Watering;

class WateringFixtures extends Fixture
{
    public const WATERING_REFERENCE = 'watering';

    public function load(ObjectManager $manager): void
    {
        $names = [
            'Peu d\'arrosage ',
            'arrosage moyen',
            'Arrosage abondant'
        ];

        for ($i=1; $i <= 3 ; $i++) {
            $watering = new Watering();

            $watering->setName($names[$i-1]);
            $this->setReference(SELF::WATERING_REFERENCE, $watering);

                $manager->persist($watering);
        }

        $manager->flush();
    }
}
