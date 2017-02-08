<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\decorator_pattern\Controller;

use Drupal\decorator_pattern\Classes\Decorator;
use Drupal\decorator_pattern\Classes\Webservice;
use Drupal\decorator_pattern\Classes\JsonRenderer;
use Drupal\decorator_pattern\Classes\XmlRenderer;
class DecoratorPatternController {

  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'decorator_pattern_content',
      ),
    );
    $service = new Webservice('foobar');
    $json_service = new JsonRenderer($service);
    $xml_service = new XmlRenderer($service);

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'XML Output',
    ];
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'pre',
      '#value' => $xml_service->renderData(),
    ];
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'JSON Output',
    ];
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'pre',
      '#value' => $json_service->renderData(),
    ];
    return $output;
  }
}
