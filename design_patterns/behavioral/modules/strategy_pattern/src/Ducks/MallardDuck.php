<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 14:59
 */

namespace Drupal\strategy_pattern\Ducks;


class MallardDuck extends Duck{
  public function __construct() {
    $this->setFlyBehavior(new FlyWithWings()) ;
    $this->setQuackBehavior(new Quack());
  }
  public function display() {
    return "I'm a real Mallard duck";
  }
}