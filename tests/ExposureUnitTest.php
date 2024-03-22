<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Exposure;

class ExposureUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $exposure = new Exposure;

        $exposure->setName('name');

        $this->assertTrue($exposure->getName() === 'name');
    }

    public function testIsFlase(): void
    {
        $exposure = new Exposure;

        $exposure->setName('name');

        $this->assertFalse($exposure->getName() === 'firstname');
    }

    public function testIsEmpty(): void
    {
        $exposure = new Exposure;

        $this->assertEmpty($exposure->getName());
    }
}
