<?php

namespace Drupal\bridge_pattern\Classes;
class PlainTextFormatter implements FormatterInterface
{
    public function format(string $text)
    {
        return $text;
    }
}
