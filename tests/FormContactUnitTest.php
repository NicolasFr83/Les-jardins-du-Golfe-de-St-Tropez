<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\FormContact;

class FormContactUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $formContact = new FormContact();

        $formContact->setName('name')
            ->setFirstName('firstName')
            ->setEmail('true_test@gmail.com')
            ->setPhoneNumber('0497988778')
            ->setSubject('sujet')
            ->setMessage('message')
            ->setCreatedAt(new \DateTimeImmutable());

            $this->assertTrue($formContact->getName() === 'name');
            $this->assertTrue($formContact->getFirstName() === 'firstName');
            $this->assertTrue($formContact->getEmail() === 'true_test@gmail.com');
            $this->assertTrue($formContact->getPhoneNumber() === '0497988778');
            $this->assertTrue($formContact->getSubject() === 'sujet');
            $this->assertTrue($formContact->getMessage() === 'message');
            $this->assertTrue($formContact->getCreatedAt() instanceof \DateTimeImmutable);
    }

    public function testIsFalse(): void
    {
        $formContact = new FormContact();

        $formContact->setName('name')
            ->setFirstName('firstName')
            ->setEmail('true_test@gmail.com')
            ->setPhoneNumber('0497988778')
            ->setSubject('sujet')
            ->setMessage('message')
            ->setCreatedAt(new \DateTimeImmutable());

            $this->assertFalse($formContact->getName() === 'firstname');
            $this->assertFalse($formContact->getFirstName() === 'tName');
            $this->assertFalse($formContact->getEmail() === 'false_test@gmail.com');
            $this->assertFalse($formContact->getPhoneNumber() === '0497988792');
            $this->assertFalse($formContact->getSubject() === 'message');
            $this->assertFalse($formContact->getMessage() === 'sujet');
            $this->assertFalse($formContact->getCreatedAt() instanceof \DateTime);
    }

    public function testIsEmpty(): void
    {
        $formContact = new FormContact();

            $this->assertEmpty($formContact->getName());
            $this->assertEmpty($formContact->getFirstName());
            $this->assertEmpty($formContact->getEmail());
            $this->assertEmpty($formContact->getPhoneNumber());
            $this->assertEmpty($formContact->getSubject());
            $this->assertEmpty($formContact->getMessage());
    }
}
