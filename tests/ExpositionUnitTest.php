<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Exposition;

class ExpositionUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $exposition = new Exposition();

        $exposition->setName('name');

        $this->assertTrue($exposition->getName() === 'name');
    }

    public function testIsFalse(): void
    {
        $exposition = new Exposition();

        $exposition->setName('name');

        $this->assertFalse($exposition->getName() === 'Firstname');

    }

    public function testIsEmpty(): void
    {
        $exposition = new Exposition();

        $this->assertEmpty($exposition->getName());

    }
}
