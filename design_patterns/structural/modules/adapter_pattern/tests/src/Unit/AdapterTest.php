<?php

namespace DesignPatterns\Structural\Adapter\Tests;

use Drupal\adapter_pattern\Classes\Book;
use Drupal\adapter_pattern\Classes\EBookAdapter;
use Drupal\adapter_pattern\Classes\Kindle;
use Drupal\Tests\UnitTestCase;

class AdapterTest extends UnitTestCase
{
    public function testCanTurnPageOnBook()
    {
        $book = new Book();
        $book->open();
        $book->turnPage();

        $this->assertEquals(2, $book->getPage());
    }

    public function testCanTurnPageOnKindleLikeInANormalBook()
    {
        $kindle = new Kindle();
        $book = new EBookAdapter($kindle);

        $book->open();
        $book->turnPage();

        $this->assertEquals(2, $book->getPage());
    }
}
