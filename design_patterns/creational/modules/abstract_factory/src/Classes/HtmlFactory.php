<?php

namespace Drupal\abstract_factory\Classes;
;

class HtmlFactory extends AbstractFactory {
  public function createText(string $content) {
    return new HtmlText($content);
  }
}
