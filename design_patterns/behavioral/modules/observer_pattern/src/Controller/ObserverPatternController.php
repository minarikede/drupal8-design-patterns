<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\observer_pattern\Controller;

use Drupal\observer_pattern\Classes\User;
use Drupal\observer_pattern\Classes\UserObserver;


class observerPatternController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'observer_pattern_content',
      ),
    );
    $observer = new UserObserver();

    $user = new User();
    $user->attach($observer);

    $user->changeEmail('foo@bar.com');
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'Changed user:' . count($observer->getChangedUsers()),
    ];
    return $output;
  }
}
