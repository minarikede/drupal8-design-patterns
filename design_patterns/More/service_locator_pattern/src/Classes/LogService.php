<?php

namespace Drupal\service_locator_pattern\Classes;
use Drupal\service_locator_pattern\Classes\LogServiceInterface;

class LogService implements LogServiceInterface
{
  public function execute() {
    return 'LogService';
  }
}
