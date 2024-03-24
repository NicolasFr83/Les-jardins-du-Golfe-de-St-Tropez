<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{

    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {}

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('LesjardinsduG@gmail.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->passwordHasher->hashPassword($admin, 'Parrot.1'))
            ->setName('Potter')
            ->setFirstname('Harry');

        $manager->persist($admin);

        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <=4; $i++) {
            $user = new User();
            $user->setEmail($faker->email())
                ->setPassword($this->passwordHasher->hashPassword($user, 'Nouvel utilisateur'))
                ->setName($faker->lastName())
                ->setFirstname($faker->firstName());
        
            $manager->persist($user);
        }

        $manager->flush();
    }
}
