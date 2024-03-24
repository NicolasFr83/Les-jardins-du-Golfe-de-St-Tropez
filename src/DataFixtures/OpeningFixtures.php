<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Opening;
Use App\DataFixtures\EnterpriseFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class OpeningFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $days = [ 
            "Lundi",
            "Mardi",
            "Mercredi",
            "Jeudi",
            "Vendredi",
        ];

        for ($i = 1; $i <= 5; $i++) {
        $opening = new Opening();

        $opening->setOpeningDay($days[$i-1])
            ->setOpeninghourmorning('08 h 00')
            ->setClosingHourmorning('12 h 00')
            ->setOpeninghourafternoon('14 h 00')
            ->setClosinghourafternoon('18 h 00')
            ->setEnterprise($this->getReference(EnterpriseFixtures::ENTERPRISE_REFERENCE));
        

            $manager->persist($opening);
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
