<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 14:42
 */

namespace Drupal\strategy_pattern\Ducks;


abstract class Duck{
  private $flyBehavior;
  private $quackBehavior;

  public function setFlyBehavior(FlyBehavior $fb) {
    $this->flyBehavior = $fb;
  }

	public function setQuackBehavior(QuackBehavior $qb) {
    $this->quackBehavior = $qb;
  }

	abstract function display();

	public function performFly() {
    return $this->flyBehavior->fly();
	}

	public function performQuack() {
    return $this->quackBehavior->quack();
	}

	public function swim() {
    return ("All ducks float, even decoys!");
	}

}