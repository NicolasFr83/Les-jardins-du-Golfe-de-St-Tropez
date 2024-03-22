<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\ServicesPage;

class ServicesPageUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $servicesPage = new ServicesPage;

        $servicesPage->setTitle('title')
            ->setServicesPresentation('services');

            $this->assertTrue($servicesPage->getTitle() === 'title');
            $this->assertTrue($servicesPage->getServicesPresentation() === 'services');
    }

    public function testIsFalse(): void
    {
        $servicesPage = new ServicesPage;

        $servicesPage->setTitle('title')
            ->setServicesPresentation('services');

            $this->assertFalse($servicesPage->getTitle() === 'titre');
            $this->assertFalse($servicesPage->getServicesPresentation() === 'presentation');
    }

    public function testIsEmpty(): void
    {
        $servicesPage = new ServicesPage;

            $this->assertEmpty($servicesPage->getTitle());
            $this->assertEmpty($servicesPage->getServicesPresentation());
    }
}
