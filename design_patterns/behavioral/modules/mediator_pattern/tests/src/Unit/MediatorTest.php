<?php

namespace Drupal\mediator_pattern\Tests;

use Drupal\mediator_pattern\Classes\Mediator;
use Drupal\mediator_pattern\Subsystem\Client;
use Drupal\mediator_pattern\Subsystem\Database;
use Drupal\mediator_pattern\Subsystem\Server;

use Drupal\Tests\UnitTestCase;

class MediatorTest extends UnitTestCase
{
    public function testOutputHelloWorld()
    {
        $client = new Client();
        $mediator = new Mediator(new Database(), $client, new Server());
        $this->assertEquals('Hello World', $mediator->makeRequest());
    }
}
