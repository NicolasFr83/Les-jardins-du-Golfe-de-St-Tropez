<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Enterprise;

class EnterpriseFixtures extends Fixture
{
    public const ENTERPRISE_REFERENCE = 'enterprise';
    
    public function load(ObjectManager $manager): void
    {
        $enterprise = new Enterprise();
        $enterprise->setName('Les jardins du Golfe de St Tropez')
            ->setPhoneNumber('0494949494')
            ->setEmail('LesjardinsduG@gmail.com')
            ->setAdress('15 rue de paul henry 83390 saint tropez');

            $this->setReference(SELF::ENTERPRISE_REFERENCE, $enterprise);

            $manager->persist($enterprise);

        $manager->flush();
    }
}
