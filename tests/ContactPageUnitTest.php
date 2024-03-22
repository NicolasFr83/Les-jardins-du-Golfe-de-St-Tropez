<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\ContactPage;

class ContactPageUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $contactPage = new ContactPage();

        $contactPage->setTitle('title')
            ->setPresentationText('presentation texte');
        
            $this->assertTrue($contactPage->getTitle() === 'title');
            $this->assertTrue($contactPage->getPresentationText() === 'presentation texte');
        }

    public function testIsFalse(): void
    {
        $contactPage = new ContactPage();
    
        $contactPage->setTitle('title')
            ->setPresentationText('text presentation');
    
            $this->assertFalse($contactPage->getTitle() === 0);
            $this->assertFalse($contactPage->getPresentationText() === 'title');
    }
    
    public function testIsEmpty(): void
    {
        $contactPage = new ContactPage();

        $this->assertEmpty($contactPage->getTitle());
        $this->assertEmpty($contactPage->getPresentationText());

    }

}
