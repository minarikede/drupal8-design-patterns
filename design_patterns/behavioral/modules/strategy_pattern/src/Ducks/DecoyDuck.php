<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 14:59
 */

namespace Drupal\strategy_pattern\Ducks;


class DecoyDuck extends Duck{
  public function __construct() {
    $this->setFlyBehavior(new FlyNoWay()) ;
    $this->setQuackBehavior(new MuteQuack());
  }
  public function display() {
    return "I'm a duck Decoy";
  }
}