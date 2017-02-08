<?php

namespace Drupal\prototype_pattern\Tests\Unit;

use Drupal\prototype_pattern\Classes\BarBookPrototype;
use Drupal\prototype_pattern\Classes\FooBookPrototype;
use Drupal\Tests\UnitTestCase;

class PrototypeTest extends UnitTestCase
{
    public function testCanGetFooBook()
    {
        $fooPrototype = new FooBookPrototype();
        $barPrototype = new BarBookPrototype();

        for ($i = 0; $i < 10; $i++) {
            $book = clone $fooPrototype;
            $book->setTitle('Foo Book No ' . $i);
            $this->assertInstanceOf('Drupal\prototype_pattern\Classes\FooBookPrototype', $book);
        }

        for ($i = 0; $i < 5; $i++) {
            $book = clone $barPrototype;
            $book->setTitle('Bar Book No ' . $i);
            $this->assertInstanceOf('Drupal\prototype_pattern\Classes\BarBookPrototype', $book);
        }
    }
}
