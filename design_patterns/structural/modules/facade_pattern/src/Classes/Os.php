<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.17.
 * Time: 16:17
 */

namespace Drupal\facade_pattern\Classes;

class Os implements OsInterface{
  public function halt() {
    return 'The system halts.';
  }

  public function getName(){
    return 'Linux';
  }
}