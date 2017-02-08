<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\command_pattern\Controller;

use Drupal\command_pattern\Classes\BookCommandee;
use Drupal\command_pattern\Classes\BookStarsOffCommand;
use Drupal\command_pattern\Classes\BookStarsOnCommand;

class CommandPatternController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'command_pattern_content',
      ),
    );

    $book = new BookCommandee('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');
    $output[] = array(
      '#markup' => '<br />' . $book->getAuthorAndTitle(),
    );

    $starsOn = new BookStarsOnCommand($book);
    $starsOn->execute();
    $output[] = array(
      '#markup' => '<br />' . $book->getAuthorAndTitle(),
    );

    $starsOff = new BookStarsOffCommand($book);
    $starsOff->execute();
    $output[] = array(
      '#markup' => '<br />' . $book->getAuthorAndTitle(),
    );

    return $output;
  }

}