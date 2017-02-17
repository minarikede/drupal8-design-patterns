<?php

namespace Drupal\flyweight_pattern\Classes;
interface FlyweightInterface
{
    public function render(string $extrinsicState): string;
}
