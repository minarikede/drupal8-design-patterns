<?php

namespace Drupal\factory_method\Classes;

class CarFerrari implements VehicleInterface
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
        return 'Ferrary';
    }
}
