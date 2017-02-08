<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\mediator_pattern\Controller;

use Drupal\mediator_pattern\Classes\Mediator;
use Drupal\mediator_pattern\Subsystem\Client;
use Drupal\mediator_pattern\Subsystem\Database;
use Drupal\mediator_pattern\Subsystem\Server;

class MediatorPatternController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'mediator_pattern_content',
      ),
    );
    $client = new Client();
    $db = new Database();
    $server = new Server();
    $mediator = new Mediator($db, $client, $server);

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => t('Server object'),
    ];
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $mediator->makeRequest(),
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => t('Database object'),
    ];
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $mediator->queryDb(),
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => t('Client object'),
    ];
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $mediator->sendResponse('Custom text'),
    ];

    return $output;
  }
}
