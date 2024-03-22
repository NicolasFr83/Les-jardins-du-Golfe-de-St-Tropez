<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Tips;

class TipsUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $tips = new Tips();

        $tips->setName('name')
            ->setDescription('description');

            $this->assertTrue($tips->getName() === 'name');
            $this->assertTrue($tips->getDescription() === 'description');
    }

    public function testIsFalse(): void
    {
        $tips = new Tips();

        $tips->setName('name')
            ->setDescription('description');

            $this->assertFalse($tips->getName() === 'firstname');
            $this->assertFalse($tips->getDescription() === 'presentation');
    }

    public function testIsEmpty(): void
    {
        $tips = new Tips();

            $this->assertEmpty($tips->getName());
            $this->assertEmpty($tips->getDescription());
    }
}
