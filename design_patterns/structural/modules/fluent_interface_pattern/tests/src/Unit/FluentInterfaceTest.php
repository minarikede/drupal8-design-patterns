<?php

namespace Drupal\fluent_interface_pattern\Tests;

use Drupal\fluent_interface_pattern\Classes\Sql;
use Drupal\Tests\UnitTestCase;

class FluentInterfaceTest extends UnitTestCase
{
    public function testBuildSQL()
    {
        $query = (new Sql())
                ->select(['foo', 'bar'])
                ->from('foobar', 'f')
                ->where('f.bar = ?');

        $this->assertEquals('SELECT foo, bar FROM foobar AS f WHERE f.bar = ?', (string) $query);
    }
}
