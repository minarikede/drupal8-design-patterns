<?php

namespace Drupal\bridge_pattern\Classes;
class HelloWorldService extends Service
{
    public function get()
    {
        return $this->implementation->format('Hello World');
    }
}
