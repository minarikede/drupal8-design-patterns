<?php

namespace Drupal\builder_pattern\Classes;

use Drupal\builder_pattern\Classes\Parts\Vehicle;

interface BuilderInterface
{
    public function createVehicle();

    public function addWheel();

    public function addEngine();

    public function addDoors();

    public function getVehicle(): Vehicle;
}
