<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.19.
 * Time: 18:26
 */

namespace Drupal\singleton\Controller;

use Drupal\singleton\Classes\Singleton;

class SingletonController {
  public function page() {
    return array(
      '#theme' => 'singleton_content',
    );
  }
}
