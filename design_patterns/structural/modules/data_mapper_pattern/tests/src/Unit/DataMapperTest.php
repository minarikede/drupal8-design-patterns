<?php

namespace Drupal\data_mapper_pattern\Tests;

use Drupal\data_mapper_pattern\Classes\StorageAdapter;
use Drupal\data_mapper_pattern\Classes\UserMapper;
use Drupal\Tests\UnitTestCase;

class DataMapperTest extends UnitTestCase
{
    public function testCanMapUserFromStorage()
    {
        $storage = new StorageAdapter([1 => ['username' => 'domnikl', 'email' => 'liebler.dominik@gmail.com']]);
        $mapper = new UserMapper($storage);

        $user = $mapper->findById(1);

        $this->assertInstanceOf('Drupal\data_mapper_pattern\Classes\User', $user);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWillNotMapInvalidData()
    {
        $storage = new StorageAdapter([]);
        $mapper = new UserMapper($storage);

        $mapper->findById(1);
    }
}
