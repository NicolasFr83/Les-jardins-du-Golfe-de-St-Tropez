<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Opening;

class OpeningUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $opening = new Opening();

        $opening->setOpeningday('Lundi')
            ->setOpeningHourMorning(8)
            ->setClosinghourmorning(12)
            ->setOpeninghourafternoon(14)
            ->setClosinghourafternoon(18);

            $this->assertTrue($opening->getOpeningday() ==='Lundi');
            $this->assertTrue($opening->getOpeningHourMorning() === 8);
            $this->assertTrue($opening->getClosinghourmorning() ===  12);
            $this->assertTrue($opening->getOpeninghourafternoon() === 14);
            $this->assertTrue($opening->getClosinghourafternoon() === 18);
    }

    public function testIsFalse(): void
    {
        $opening = new Opening();

        $opening->setOpeningday('Lundi')
            ->setOpeningHourMorning(8)
            ->setClosinghourmorning(12)
            ->setOpeninghourafternoon(14)
            ->setClosinghourafternoon(18);

            $this->assertFalse($opening->getOpeningday() ==='Dimanche');
            $this->assertFalse($opening->getOpeningHourMorning() === 9);
            $this->assertFalse($opening->getClosinghourmorning() === 10);
            $this->assertFalse($opening->getOpeninghourafternoon() === 15);
            $this->assertFalse($opening->getClosinghourafternoon() === 11);
    }

    public function testIsEmpty(): void
    {
        $opening = new Opening();

            $this->assertEmpty($opening->getOpeningday());
            $this->assertEmpty($opening->getOpeningHourMorning());
            $this->assertEmpty($opening->getClosinghourmorning());
            $this->assertEmpty($opening->getOpeninghourafternoon());
            $this->assertEmpty($opening->getClosinghourafternoon());
    }

}
