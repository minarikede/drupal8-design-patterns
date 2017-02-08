<?php

namespace Drupal\visitor_pattern\Tests;

use Drupal\visitor_pattern\Classes\Visitor;
use Drupal\visitor_pattern\Classes\User;
use Drupal\visitor_pattern\Classes\Group;
use Drupal\visitor_pattern\Classes\RoleVisitor;
use Drupal\visitor_pattern\Classes\Role;
use Drupal\Tests\UnitTestCase;

class VisitorTest extends UnitTestCase
{
    /**
     * @var RoleVisitor
     */
    private $visitor;

    protected function setUp()
    {
        $this->visitor = new RoleVisitor();
    }

    public function provideRoles()
    {
        return [
            [new User('Dominik')],
            [new Group('Administrators')],
        ];
    }

    /**
     * @dataProvider provideRoles
     *
     * @param Role $role
     */
    public function testVisitSomeRole(Role $role)
    {
        $role->accept($this->visitor);
        $this->assertSame($role, $this->visitor->getVisited()[0]);
    }
}
