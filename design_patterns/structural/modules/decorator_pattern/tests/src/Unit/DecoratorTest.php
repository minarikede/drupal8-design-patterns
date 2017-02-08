<?php

namespace Drupal\decorator_pattern\Tests;

use Drupal\decorator_pattern\Classes\Decorator;
use Drupal\decorator_pattern\Classes\Webservice;
use Drupal\decorator_pattern\Classes\JsonRenderer;
use Drupal\decorator_pattern\Classes\XmlRenderer;
use Drupal\Tests\UnitTestCase;

class DecoratorTest extends UnitTestCase
{
    /**
     * @var Decorator\Webservice
     */
    private $service;

    protected function setUp()
    {
        $this->service = new Webservice('foobar');
    }

    public function testJsonDecorator()
    {
        $service = new JsonRenderer($this->service);

        $this->assertEquals('"foobar"', $service->renderData());
    }

    public function testXmlDecorator()
    {
        $service = new XmlRenderer($this->service);

        $this->assertXmlStringEqualsXmlString('<?xml version="1.0"?><content>foobar</content>', $service->renderData());
    }
}
