<?php

namespace DesignPatterns\More\Delegation\Tests;

use Drupal\delegation_pattern\Classes\TeamLead;
use Drupal\delegation_pattern\Classes\JuniorDeveloper;
use Drupal\Tests\UnitTestCase;

class DelegationTest extends UnitTestCase
{
    public function testHowTeamLeadWriteCode()
    {
        $junior = new JuniorDeveloper();
        $teamLead = new TeamLead($junior);

        $this->assertEquals($junior->writeBadCode(), $teamLead->writeCode());
    }
}
