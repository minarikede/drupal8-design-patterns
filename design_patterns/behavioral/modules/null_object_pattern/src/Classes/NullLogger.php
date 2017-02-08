<?php

namespace Drupal\null_object_pattern\Classes;

class NullLogger implements LoggerInterface
{
    public function log(string $str)
    {
        // do nothing
    }
}
