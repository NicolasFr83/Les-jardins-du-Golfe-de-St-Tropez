<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Opinion;

class OpinionTestCaseTest extends TestCase
{
    public function testIsTrue(): void
    {
        $opinion = new Opinion();

        $opinion->setName('name')
            ->setAvis('commentaire')
            ->setScore(2)
            ->setCreatedAt( new \DateTimeImmutable());

            $this->assertTrue($opinion->getName() ==='name');
            $this->assertTrue($opinion->getAvis() === 'commentaire');
            $this->assertTrue($opinion->getScore() === 2);
            $this->assertTrue($opinion->getCreatedAt() instanceof \DateTimeImmutable);
    }

    public function testIsFalse(): void
    {
        $opinion = new Opinion();

        $opinion->setName('name')
            ->setAvis('commentaire')
            ->setScore(2)
            ->setCreatedAt( new \DateTimeImmutable());

            $this->assertFalse($opinion->getName() ==='firstname');
            $this->assertFalse($opinion->getAvis() === 'comment');
            $this->assertFalse($opinion->getScore() === 5);
            $this->assertFalse($opinion->getCreatedAt() instanceof \DateTime);
    }

    public function testIsEmpty(): void
    {
        $opinion = new Opinion();

            $this->assertEmpty($opinion->getName());
            $this->assertEmpty($opinion->getAvis());
            $this->assertEmpty($opinion->getScore());
    }
}
