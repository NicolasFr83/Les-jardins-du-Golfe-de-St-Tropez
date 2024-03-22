<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Watering;

class WateringUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $watering = new Watering();

        $watering->setName('name');

        $this->assertTrue($watering->getName() === 'name');
    }

    public function testIsFalse(): void
    {
        $watering = new Watering();

        $watering->setName('name');

        $this->assertFalse($watering->getName() === 'firstname');
    }

    public function testIsEmpty(): void
    {
        $watering = new Watering();

        $this->assertEmpty($watering->getName());
    }
}
