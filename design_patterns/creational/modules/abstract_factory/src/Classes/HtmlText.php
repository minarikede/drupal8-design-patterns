<?php

namespace Drupal\abstract_factory\Classes;

class HtmlText extends Text {
  private $content;
  public function __construct($content) {
    $this->content = $content;
  }

  public function getText() {
    return "HTML Text: {$this->content}";
  }
}
