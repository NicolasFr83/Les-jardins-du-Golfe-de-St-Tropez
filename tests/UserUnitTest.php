<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\User;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();

        $user->setEmail('truc@gmail.com')
            ->setName('Pierre')
            ->setFirstname('Dupont')
            ->setCreatedat(new \DateTimeImmutable)
            ->setUpdatedat(new \DateTimeImmutable);

            $this->assertTrue($user->getEmail() === 'truc@gmail.com');
            $this->assertTrue($user->getName() === 'Pierre');
            $this->assertTrue($user->getFirstname() === 'Dupont');
            $this->assertTrue($user->getCreatedat() instanceof \DateTimeImmutable);
            $this->assertTrue($user->getUpdatedat() instanceof \DateTimeImmutable);
    }

    public function testIsFalse(): void
    {
        $user = new User();

        $user->setEmail('truc@gmail.com')
            ->setName('Pierre')
            ->setFirstname('Dupont')
            ->setCreatedat(new \DateTimeImmutable)
            ->setUpdatedat(new \DateTimeImmutable);

            $this->assertFalse($user->getEmail() === 'trucmuche@gmail.com');
            $this->assertFalse($user->getName() === 'Pierrette');
            $this->assertFalse($user->getFirstname() === 'Duponte');
            $this->assertFalse($user->getCreatedat() instanceof \DateTime);
            $this->assertFalse($user->getUpdatedat() instanceof \DateTime);
    }

    public function testIsEmpty(): void
    {
        $user = new User();

            $this->assertEmpty($user->getEmail());
            $this->assertEmpty($user->getName());
            $this->assertEmpty($user->getFirstname());
    }
}
