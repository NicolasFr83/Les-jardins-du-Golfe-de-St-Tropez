<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Exposure;

class ExposureFixtures extends Fixture
{
    public const EXPOSURE_REFERENCE = 'Exposure';

    public function load(ObjectManager $manager): void
    {
        $names =[
            'inside',
            'outside',
        ];

        for ($i=1; $i <=2 ; $i++) {
            $exposure = new Exposure();

            $exposure->setName($names[$i-1]);
            $this->setReference(SELF::EXPOSURE_REFERENCE, $exposure);

                $manager->persist($exposure);
        }        
        $manager->flush();
    }
}
