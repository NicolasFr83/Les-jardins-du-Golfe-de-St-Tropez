<?php

namespace App\Tests;

use App\Entity\Enterprise;
use PHPUnit\Framework\TestCase;

class EnterpriseUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $enterprise = new Enterprise();

        $enterprise->setName('name')
            ->setPhoneNumber('0494999897')
            ->setEmail('LesJardinsduG.@gmail.com')
            ->setAdress('12 rue de josé');

            $this->assertTrue($enterprise->getName() === 'name');
            $this->assertTrue($enterprise->getPhoneNumber() === '0494999897');
            $this->assertTrue($enterprise->getEmail() === 'LesJardinsduG.@gmail.com');
            $this->assertTrue($enterprise->getAdress() === '12 rue de josé');      
    }

    public function testIsFalse(): void
    {
        $enterprise = new Enterprise();

        $enterprise->setName('name')
        ->setEmail('LesJardinsduG.@gmail.com')
        ->setPhoneNumber('0494999999')
        ->setAdress('12 rue de josé');

        $this->assertFalse($enterprise->getName() === 'firstname');
        $this->assertFalse($enterprise->getEmail() === 'LesPotter.@gmail.com');
        $this->assertFalse($enterprise->getPhoneNumber() === '0494990000'); 
        $this->assertFalse($enterprise->getAdress() === '18 rue de josé');      
    
    }

    public function testIsEmpty(): void
    {
        $enterprise = new Enterprise();

        $this->assertEmpty($enterprise->getName());
        $this->assertEmpty($enterprise->getEmail());
        $this->assertEmpty($enterprise->getPhoneNumber());
        $this->assertEmpty($enterprise->getAdress());

    }
}
