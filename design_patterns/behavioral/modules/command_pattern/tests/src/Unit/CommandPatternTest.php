<?php

namespace Drupal\command_pattern\Tests;

use Drupal\Tests\UnitTestCase;

use Drupal\command_pattern\Classes\BookCommandee;
use Drupal\command_pattern\Classes\BookStarsOffCommand;
use Drupal\command_pattern\Classes\BookStarsOnCommand;

class CommandPatternTest extends UnitTestCase {
  public function testApplyStar()
  {

    $book = new BookCommandee('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');
    $starsOn = new BookStarsOnCommand($book);
    $starsOn->execute();
    $this->assertEquals($book->getAuthorAndTitle(), 'Design*Patterns by Gamma,*Helm,*Johnson,*and*Vlissides');
  }
  public function testRemoveStar()
  {

    $book = new BookCommandee('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');
    $starsOn = new BookStarsOnCommand($book);
    $starsOn->execute();
    $starsOff = new BookStarsOffCommand($book);
    $starsOff->execute();
    $this->assertEquals($book->getAuthorAndTitle(), 'Design Patterns by Gamma, Helm, Johnson, and Vlissides');
  }
}
