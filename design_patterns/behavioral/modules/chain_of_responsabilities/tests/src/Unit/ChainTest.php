<?php

namespace Drupal\chain_of_responsabilities\Tests;

use Drupal\Tests\UnitTestCase;
use Drupal\chain_of_responsabilities\Classes\Handler;
use Drupal\chain_of_responsabilities\Classes\HttpInMemoryCacheHandler;
use Drupal\chain_of_responsabilities\Classes\SlowDatabaseHandler;

class ChainTest extends UnitTestCase {
  /**
   * @var Handler
   */
  private $chain;

  protected function setUp() {
    $this->chain = new HttpInMemoryCacheHandler(
      ['/foo/bar?index=1' => 'Hello In Memory!'],
      new SlowDatabaseHandler()
    );
  }

  public function testCanRequestKeyInFastStorage() {
    $uri = $this->getMock('Psr\Http\Message\UriInterface');
    $uri->method('getPath')->willReturn('/foo/bar');
    $uri->method('getQuery')->willReturn('index=1');

    $request = $this->getMock('Psr\Http\Message\RequestInterface');
    $request->method('getMethod')
      ->willReturn('GET');
    $request->method('getUri')->willReturn($uri);

    $this->assertEquals('Hello In Memory!', $this->chain->handle($request));
  }

  public function testCanRequestKeyInSlowStorage() {
    $uri = $this->getMock('Psr\Http\Message\UriInterface');
    $uri->method('getPath')->willReturn('/foo/baz');
    $uri->method('getQuery')->willReturn('');

    $request = $this->getMock('Psr\Http\Message\RequestInterface');
    $request->method('getMethod')
      ->willReturn('GET');
    $request->method('getUri')->willReturn($uri);

    $this->assertEquals('Hello World!', $this->chain->handle($request));
  }
}
