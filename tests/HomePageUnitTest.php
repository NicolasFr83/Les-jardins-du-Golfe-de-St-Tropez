<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\HomePage;

class HomePageUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $homePage = new HomePage();

        $homePage->setTitle('title')
            ->setPresentationText('presentation text');

        $this->assertTrue($homePage->getTitle() === 'title');
        $this->assertTrue($homePage->getPresentationText() === 'presentation text');
    }

    public function testIsFalse(): void
    {
        $homePage = new HomePage();

        $homePage->setTitle('title')
            ->setPresentationText('presentation text');

        $this->assertFalse($homePage->getTitle() === 'titre');
        $this->assertFalse($homePage->getPresentationText() === 'presentation word');
    }

    public function testIsEmpty(): void
    {
        $homePage = new HomePage();

        $this->assertEmpty($homePage->getTitle());
        $this->assertEmpty($homePage->getPresentationText());
    }
}
