<?php

namespace Drupal\mediator_pattern\Subsystem;

use Drupal\mediator_pattern\Classes\Colleague;

/**
 * Client is a client that makes requests and gets the response.
 */
class Client extends Colleague
{
    public function request()
    {
        return $this->mediator->makeRequest();
    }

    public function output(string $content)
    {
        return $content;
    }
}
