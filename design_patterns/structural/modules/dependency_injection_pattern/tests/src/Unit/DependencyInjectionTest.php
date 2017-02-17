<?php

namespace Drupal\dependency_injection_pattern\Tests;

use Drupal\dependency_injection_pattern\Classes\DatabaseConnection;
use Drupal\dependency_injection_pattern\Classes\DatabaseConfiguration;
use Drupal\Tests\UnitTestCase;

class DependencyInjectionTest extends UnitTestCase
{
    public function testDependencyInjection()
    {
        $config = new DatabaseConfiguration('localhost', 3306, 'domnikl', '1234');
        $connection = new DatabaseConnection($config);

        $this->assertEquals('domnikl:1234@localhost:3306', $connection->getDsn());
    }
}
