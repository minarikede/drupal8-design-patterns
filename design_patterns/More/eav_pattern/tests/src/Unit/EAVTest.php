<?php

namespace Drupal\eav_pattern\Tests;

use Drupal\eav_pattern\Classes\Attribute;
use Drupal\eav_pattern\Classes\Entity;
use Drupal\eav_pattern\Classes\Value;
use Drupal\Tests\UnitTestCase;

class EAVTest extends UnitTestCase
{
    public function testCanAddAttributeToEntity()
    {
        $colorAttribute = new Attribute('color');
        $colorSilver = new Value($colorAttribute, 'silver');
        $colorBlack = new Value($colorAttribute, 'black');

        $memoryAttribute = new Attribute('memory');
        $memory8Gb = new Value($memoryAttribute, '8GB');

        $entity = new Entity('MacBook Pro', [$colorSilver, $colorBlack, $memory8Gb]);

        $this->assertEquals('MacBook Pro, color: silver, color: black, memory: 8GB', (string) $entity);
    }
}
