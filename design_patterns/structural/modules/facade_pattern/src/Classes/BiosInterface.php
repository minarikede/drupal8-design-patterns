<?php

namespace Drupal\facade_pattern\Classes;

interface BiosInterface {
  public function execute();

  public function waitForKeyPress();

  public function launch(OsInterface $os);

  public function powerDown();
}