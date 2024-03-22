<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Topics;

class TopicsUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $topics = new Topics();

        $topics->setName('name')
            ->setLatinName('latin name')
            ->setDescription('description');

            $this->assertTrue($topics->getName() === 'name');
            $this->assertTrue($topics->getLatinName() === 'latin name');
            $this->assertTrue($topics->getDescription() === 'description');
    }

    public function testIsFalse(): void
    {
        $topics = new Topics();

        $topics->setName('name')
            ->setLatinName('latin name')
            ->setDescription('description');

            $this->assertFalse($topics->getName() === 'firstname');
            $this->assertFalse($topics->getLatinName() === 'latinus name');
            $this->assertFalse($topics->getDescription() === 'descriptionne');
    }

    public function testIsEmpty(): void
    {
        $topics = new Topics();

            $this->assertEmpty($topics->getName());
            $this->assertEmpty($topics->getLatinName());
            $this->assertEmpty($topics->getDescription());
    }
}
