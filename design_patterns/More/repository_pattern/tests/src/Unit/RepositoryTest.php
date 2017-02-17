<?php

namespace DesignPatterns\More\Repository\Tests;

use Drupal\repository_pattern\Classes\MemoryStorage;
use Drupal\repository_pattern\Classes\Post;
use Drupal\repository_pattern\Classes\PostRepository;
use Drupal\Tests\UnitTestCase;

class Repository extends UnitTestCase
{
    public function testCanPersistAndFindPost()
    {
        $repository = new PostRepository(new MemoryStorage());
        $post = new Post(null, 'Repository Pattern', 'Design Patterns PHP');
        $repository->save($post);

        $this->assertEquals(1, $post->getId());
        $this->assertEquals($post->getId(), $repository->findById(1)->getId());
    }
}
