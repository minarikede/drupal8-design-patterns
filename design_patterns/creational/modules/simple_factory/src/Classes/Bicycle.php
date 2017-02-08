<?php

namespace Drupal\simple_factory\Classes;

class Bicycle {
  public function driveTo(string $destination) {
    return "<br />Long way to $destination by bicycle";
  }
}
