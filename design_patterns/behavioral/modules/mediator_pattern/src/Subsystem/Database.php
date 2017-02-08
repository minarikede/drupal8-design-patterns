<?php

namespace Drupal\mediator_pattern\Subsystem;

use Drupal\mediator_pattern\Classes\Colleague;
class Database extends Colleague
{
    public function getData(): string
    {
        return 'World';
    }
}
