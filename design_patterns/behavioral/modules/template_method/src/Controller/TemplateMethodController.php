<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\template_method\Controller;

use Drupal\template_method\Classes\BeachJourney;
use Drupal\template_method\Classes\CityJourney;

class TemplateMethodController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'template_method_content',
      ),
    );
    $beachJourney = new BeachJourney();
    $beachJourney->takeATrip();

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => t('Beach Journey'),
    ];

    $output[] = [
      '#theme' => 'item_list',
      '#items' => $beachJourney->getThingsToDo(),
    ];

    $cityJourney = new CityJourney();
    $cityJourney->takeATrip();

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => t('City Journey'),
    ];

    $output[] = [
      '#theme' => 'item_list',
      '#items' => $cityJourney->getThingsToDo(),
    ];
    return $output;
  }
}
