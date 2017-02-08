<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\bridge_pattern\Controller;

use Drupal\bridge_pattern\Classes\HelloWorldService;
use Drupal\bridge_pattern\Classes\HtmlFormatter;
use Drupal\bridge_pattern\Classes\PlainTextFormatter;

class BridgePatternController {

  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'bridge_pattern_content',
      ),
    );
    $service = new HelloWorldService(new PlainTextFormatter());

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'div',
      '#value' => $service->get(),
    ];
    // Now change the implemenation and use the HtmlFormatter instead.
    $service->setImplementation(new HtmlFormatter());
    $output[] = [
      '#markup' => $service->get(),
    ];
    return $output;
  }
}
