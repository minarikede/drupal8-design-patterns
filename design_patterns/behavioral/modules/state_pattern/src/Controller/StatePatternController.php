<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\state_pattern\Controller;


use Drupal\state_pattern\Classes\OrderRepository;
use Masterminds\HTML5\Exception;

class StatePatternController {
  public function page() {
    $output = [
      'main_content' => array(
        '#theme' => 'state_pattern_content',
      ),
    ];
    $order = (new OrderRepository())->findById(1);

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'The order status:' . $order->getStatus(),
    ];
    $order->shipOrder();
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'The order status:' . $order->getStatus(),
    ];

    try {
      $order->completeOrder();
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'The order status:' . $order->getStatus(),
      ];
    }
    catch (Exception $e) {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => $e->getMessage(),
      ];
    }

    return $output;
  }
}
