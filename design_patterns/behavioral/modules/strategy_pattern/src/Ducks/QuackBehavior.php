<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 14:52
 */

namespace Drupal\strategy_pattern\Ducks;


interface QuackBehavior {
  public function quack();
}