<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\ExpositionFixtures;
use App\DataFixtures\ExposureFixtures;
use App\DataFixtures\CategoryFixtures;
use App\DataFixtures\WateringFixtures;
use App\Entity\Topics;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;


class TopicsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <=10; $i++) {
            $topics = new Topics();
            $topics->setName($faker->text(10))
                ->setLatinName($faker->text(15))
                ->setImageName('default.jpg')
                ->setDescription($faker->text(50))
                ->setExposition($this->getReference(ExpositionFixtures::EXPOSITION_REFERENCE))
                ->setExposure($this->getReference(ExposureFixtures::EXPOSURE_REFERENCE))
                ->setCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE))
                ->setWatering($this->getReference(WateringFixtures::WATERING_REFERENCE));
                

            $manager->persist($topics);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ExpositionFixtures::class,
            ExposureFixtures::class,
            CategoryFixtures::class,
            WateringFixtures::class,
        ];
    }
}
