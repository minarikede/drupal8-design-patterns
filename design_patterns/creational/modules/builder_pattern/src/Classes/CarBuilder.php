<?php

namespace Drupal\builder_pattern\Classes;

use Drupal\builder_pattern\Classes\Parts\Vehicle;

class CarBuilder implements BuilderInterface
{
    /**
     * @var Parts\Car
     */
    private $car;

    public function addDoors()
    {
        $this->car->setPart('door', 'rightDoor', new Parts\Door());
        $this->car->setPart('door', 'leftDoor', new Parts\Door());
        $this->car->setPart('door', 'trunkLid', new Parts\Door());
    }

    public function addEngine()
    {
        $this->car->setPart('engine', 'engine', new Parts\Engine());
    }

    public function addWheel()
    {
        $this->car->setPart('wheel', 'wheelLF', new Parts\Wheel());
        $this->car->setPart('wheel', 'wheelRF', new Parts\Wheel());
        $this->car->setPart('wheel', 'wheelLR', new Parts\Wheel());
        $this->car->setPart('wheel', 'wheelRR', new Parts\Wheel());
    }

    public function createVehicle()
    {
        $this->car = new Parts\Car();
    }

    public function getVehicle(): Vehicle
    {
        return $this->car;
    }
}
