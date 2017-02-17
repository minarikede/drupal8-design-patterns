<?php

namespace Drupal\delegation_pattern\Classes;
class TeamLead
{
    /**
     * @var JuniorDeveloper
     */
    private $junior;

    /**
     * @param JuniorDeveloper $junior
     */
    public function __construct(JuniorDeveloper $junior)
    {
        $this->junior = $junior;
    }

    public function writeCode(): string
    {
        return $this->junior->writeBadCode();
    }
}
