<?php

namespace Drupal\state_pattern\Tests;

use Drupal\state_pattern\Classes\OrderRepository;
use Drupal\Tests\UnitTestCase;

class StateTest extends UnitTestCase
{
    public function testCanShipCreatedOrder()
    {
        $order = (new OrderRepository())->findById(1);
        $order->shipOrder();

        $this->assertEquals('shipping', $order->getStatus());
    }

    public function testCanCompleteShippedOrder()
    {
        $order = (new OrderRepository())->findById(2);
        $order->completeOrder();

        $this->assertEquals('completed', $order->getStatus());
    }

    /**
     * @expectedException \Exception
     */
    public function testThrowsExceptionWhenTryingToCompleteCreatedOrder()
    {
        $order = (new OrderRepository())->findById(1);
        $order->completeOrder();
    }
}
