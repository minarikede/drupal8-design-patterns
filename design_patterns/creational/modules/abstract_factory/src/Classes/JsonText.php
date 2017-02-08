<?php

namespace Drupal\abstract_factory\Classes;

class JsonText extends Text {
  private $content;
  public function __construct($content) {
    $this->content = $content;
  }

  public function getText() {
    return "JSON Text: {$this->content}";
  }
}
