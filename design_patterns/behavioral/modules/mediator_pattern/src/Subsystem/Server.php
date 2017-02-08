<?php

namespace Drupal\mediator_pattern\Subsystem;

use Drupal\mediator_pattern\Classes\Colleague;

class Server extends Colleague
{
    public function process()
    {
        $data = $this->mediator->queryDb();
        return $this->mediator->sendResponse(sprintf("Hello %s", $data));
    }
}
