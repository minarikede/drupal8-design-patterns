<?php
namespace Drupal\proxy_pattern\Tests;

use Drupal\proxy_pattern\Classes\RecordProxy;
use Drupal\Tests\UnitTestCase;

class ProxyTest extends UnitTestCase
{
    public function testWillSetDirtyFlagInProxy()
    {
        $recordProxy = new RecordProxy([]);
        $recordProxy->username = 'baz';

        $this->assertTrue($recordProxy->isDirty());
    }

    public function testProxyIsInstanceOfRecord()
    {
        $recordProxy = new RecordProxy([]);
        $recordProxy->username = 'baz';

        $this->assertInstanceOf('Drupal\proxy_pattern\Classes\Record', $recordProxy);
    }
}
