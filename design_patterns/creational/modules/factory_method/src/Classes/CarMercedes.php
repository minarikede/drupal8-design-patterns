<?php

namespace Drupal\factory_method\Classes;

class CarMercedes implements VehicleInterface
{
    /**
     * @var string
     */
    private $color;

    public function setColor(string $rgb)
    {
        $this->color = $rgb;
    }

    public function addAMGTuning()
    {
        // do additional tuning here
    }
    public function getVechicleType() {
        return 'Mercedes';
    }
}
