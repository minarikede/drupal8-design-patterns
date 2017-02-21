<?php

namespace Drupal\observer_pattern\Tests;

use Drupal\observer_pattern\User\User;
use Drupal\observer_pattern\User\UserObserver;
use Drupal\Tests\UnitTestCase;

class ObserverTest extends UnitTestCase
{
    public function testChangeInUserLeadsToUserObserverBeingNotified()
    {
        $observer = new UserObserver();

        $user = new User();
        $user->attach($observer);

        $user->changeEmail('foo@bar.com');
        $this->assertCount(1, $observer->getChangedUsers());
    }
}
