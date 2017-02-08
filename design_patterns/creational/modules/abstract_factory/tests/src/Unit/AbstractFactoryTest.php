<?php

namespace Drupal\Tests\abstract_factory\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\abstract_factory\Classes\HtmlFactory;
use Drupal\abstract_factory\Classes\JsonFactory;

class AbstractFactoryTest extends UnitTestCase
{
    public function testCanCreateHtmlText()
    {
        $factory = new HtmlFactory();
        $text = $factory->createText('foobar');

        $this->assertInstanceOf('Drupal\abstract_factory\Classes\HtmlText', $text);
    }

    public function testCanCreateJsonText()
    {
        $factory = new JsonFactory();
        $text = $factory->createText('foobar');

        $this->assertInstanceOf('Drupal\abstract_factory\Classes\JsonText', $text);
    }
}
