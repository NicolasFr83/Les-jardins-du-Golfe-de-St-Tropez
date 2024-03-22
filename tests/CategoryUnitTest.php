<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Category;

class CategoryUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $category = new Category();

        $category->setName('name');
        
        $this->assertTrue($category->getName() === 'name');
    }

    public function testIsFalse(): void
    {
        $category = new Category();

        $category->setName('name');

        $this->assertFalse($category->getName() === 'false');
    }

    public function testIsEmpty(): void
    {
        $category = new Category();

        $this->assertEmpty($category->getName());
    }
}
