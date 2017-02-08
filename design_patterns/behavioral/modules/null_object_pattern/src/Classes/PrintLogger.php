<?php

namespace Drupal\null_object_pattern\Classes;

class PrintLogger implements LoggerInterface
{
    public function log(string $str)
    {
        return $str;
    }
}
