<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\memento_pattern\Controller;

use Drupal\memento_pattern\Classes\Ticket;


class mementoPatternController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'memento_pattern_content',
      ),
    );

    $ticket = new Ticket();
    $ticket->open();
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Ticket state',
    ];
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $ticket->getState()->__toString(),
    ];
    $memento = $ticket->saveToMemento();

    $ticket->assign();

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Ticket state',
    ];
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => (string) $ticket->getState(),
    ];

    $ticket->restoreFromMemento($memento);

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Ticket state',
    ];
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $ticket->getState()->__toString(),
    ];
    return $output;
  }
}
