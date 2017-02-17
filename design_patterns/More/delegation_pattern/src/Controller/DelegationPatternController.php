<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\delegation_pattern\Controller;

use Drupal\delegation_pattern\Classes\TeamLead;
use Drupal\delegation_pattern\Classes\JuniorDeveloper;
class DelegationPatternController {

  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'delegation_pattern_content',
      ),
    );
    $junior = new JuniorDeveloper();
    $teamLead = new TeamLead($junior);
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'Junior: ' . $junior->writeBadCode(),
    ];
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' =>'Team lead: ' . $teamLead->writeCode(),
    ];
    return $output;
  }
}
