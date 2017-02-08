<?php

namespace Drupal\builder_pattern\Classes\Parts;

abstract class Vehicle
{
    /**
     * @var object[]
     */
    private $data = [];

    /**
     * @param string $key
     * @param object $value
     */
    public function setPart($type, $key, $value)
    {
        $this->data[$type][$key] = $value;
    }

    public function getPart($type)
    {
        $items = array_keys($this->data[$type]);
        $elements = implode(', ', $items);
        return "<h3>{$type}:</h3><p>$elements</p>";
    }
}
