<?php

namespace Drupal\bridge_pattern\Tests;

use Drupal\bridge_pattern\Classes\HelloWorldService;
use Drupal\bridge_pattern\Classes\HtmlFormatter;
use Drupal\bridge_pattern\Classes\PlainTextFormatter;
use Drupal\Tests\UnitTestCase;

class BridgeTest extends UnitTestCase
{
    public function testCanPrintUsingThePlainTextPrinter()
    {
        $service = new HelloWorldService(new PlainTextFormatter());
        $this->assertEquals('Hello World', $service->get());

        // now change the implemenation and use the HtmlFormatter instead
        $service->setImplementation(new HtmlFormatter());
        $this->assertEquals('<h3><u>Hello World</u></h3>', $service->get());
    }
}
