<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\abstract_factory\Controller;

use Drupal\abstract_factory\Classes\HtmlFactory;
use Drupal\abstract_factory\Classes\JsonFactory;

class AbstractFactoryController {
  public function page() {
    $page[] = array(
      '#theme' => 'abstract_factory_content',
    );

    $custom_text = 'Custom text';
    $html = new HtmlFactory($custom_text);
    $json = new JsonFactory($custom_text);

    $html_text = $html->createText($custom_text);
    $json_text = $json->createText($custom_text);

    $page[]['#markup'] = "<br /> {$html_text->getText()}";
    $page[]['#markup'] = "<br /> {$json_text->getText()}";

    return $page;
  }

}