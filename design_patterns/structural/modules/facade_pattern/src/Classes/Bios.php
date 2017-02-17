<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.17.
 * Time: 16:20
 */

namespace Drupal\facade_pattern\Classes;

class Bios implements BiosInterface{
  public function execute() {
    return 'BIOS Executes';
  }

  public function waitForKeyPress() {
    return 'wait for key press';
  }

  public function launch(OsInterface $os) {
    $osName = $os->getName();
    return "Launch $osName";
  }

  public function powerDown() {
    return 'Power down';
  }
}