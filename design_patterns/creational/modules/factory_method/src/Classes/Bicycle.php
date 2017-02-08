<?php

namespace Drupal\factory_method\Classes;

class Bicycle implements VehicleInterface
{
    /**
     * @var string
     */
    private $color;

    public function setColor(string $rgb)
    {
        $this->color = $rgb;
    }

    public function getVechicleType() {
        return 'Bicycle';
    }
}
