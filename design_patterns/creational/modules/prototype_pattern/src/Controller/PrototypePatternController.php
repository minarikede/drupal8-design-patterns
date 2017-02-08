<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.19.
 * Time: 22:00
 */

namespace Drupal\prototype_pattern\Controller;

use Drupal\prototype_pattern\Classes\BarBookPrototype;
use Drupal\prototype_pattern\Classes\FooBookPrototype;

class PrototypePatternController {
  public function page() {
    $page[] = array(
      '#theme' => 'prototype_pattern_content',
    );

    $fooPrototype = new FooBookPrototype();
    $barPrototype = new BarBookPrototype();

    for ($i = 0; $i < 10; $i++) {
      $book = clone $fooPrototype;
      $book->setTitle('Foo Book No ' . $i);
      $page[]['#markup'] = $book->getTitle();
    }

    for ($i = 0; $i < 5; $i++) {
      $book = clone $barPrototype;
      $book->setTitle('Bar Book No ' . $i);
      $page[]['#markup'] = $book->getTitle();
    }

    return $page;
  }

}