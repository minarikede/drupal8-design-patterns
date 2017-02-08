<?php

namespace Drupal\mediator_pattern\Classes;

/**
 * Colleague is an abstract colleague who works together but he only knows
 * the Mediator, not other colleagues
 */
abstract class Colleague
{
    /**
     * this ensures no change in subclasses.
     *
     * @var MediatorInterface
     */
    protected $mediator;

    /**
     * @param MediatorInterface $mediator
     */
    public function setMediator(MediatorInterface $mediator)
    {
        $this->mediator = $mediator;
    }
}
