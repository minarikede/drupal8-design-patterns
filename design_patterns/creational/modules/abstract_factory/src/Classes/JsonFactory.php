<?php

namespace Drupal\abstract_factory\Classes;

class JsonFactory extends AbstractFactory
{
    public function createText(string $content)
    {
        return new JsonText($content);
    }
}
