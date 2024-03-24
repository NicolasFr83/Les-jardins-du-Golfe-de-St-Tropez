<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Exposition;

class ExpositionFixtures extends Fixture
{
    public const EXPOSITION_REFERENCE = 'Expostion';

    public function load(ObjectManager $manager): void
    {
        $names = [
            'Ombre',
            'Mi-ombre, mi-soleil',
            'Soleil',
        ];

        for ($i=1; $i <=3 ; $i++) {
            $exposition = new Exposition();

            $exposition->setName($names[$i-1]);
            $this->setReference(SELF::EXPOSITION_REFERENCE, $exposition);

                $manager->persist($exposition);
        }
        $manager->flush();
    }
}
