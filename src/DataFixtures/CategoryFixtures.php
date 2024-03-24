<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_REFERENCE = 'category';

    public function load(ObjectManager $manager): void
    {
        $names = [
            'Palm trees',
            'Oliv trees',
            'Fruit trees',
            'Bush',
            'Flower',
            'Cactus',
        ];

        for ($i=1; $i <= 6 ; $i++) {
            $category = new Category();

            $category->setName($names[$i-1]);
            $this->setReference(SELF::CATEGORY_REFERENCE, $category);

                $manager->persist($category);
        }
        $manager->flush();
    }
}
