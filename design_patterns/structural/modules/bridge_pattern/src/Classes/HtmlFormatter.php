<?php

namespace Drupal\bridge_pattern\Classes;
class HtmlFormatter implements FormatterInterface
{
    public function format(string $text)
    {
        return '<h3><u>' . $text . '</u></h3>';    }
}
