<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\strategy_pattern\Controller;

use Drupal\strategy_pattern\Classes\DateComparator;
use Drupal\strategy_pattern\Classes\IdComparator;
use Drupal\strategy_pattern\Classes\ObjectCollection;

class StrategyPatternController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'strategy_pattern_content',
      ),
    );

    $integers = $this->provideIntegers();
    $obj = new ObjectCollection($integers);
    $obj->setComparator(new IdComparator());
    $elements = $obj->sort();
    $elements_array = array_map(function($value) {
      return $value['id'];
    }, $elements);

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'Sorted integers: ' . implode(', ', $elements_array),
    ];


    $dates = $this->providateDates();
    $obj = new ObjectCollection($dates);
    $obj->setComparator(new DateComparator());
    $elements = $obj->sort();
    $elements_array = array_map(function($value) {
      return $value['date'];
    }, $elements);
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'Sorted dates: ' . implode(', ', $elements_array),
    ];

    return $output;
  }
  public function provideIntegers()
  {
    return [['id' => 21], ['id' => 13], ['id' => 31]];
  }

  public function providateDates()
  {
    return [
      ['date' => '2014-03-03'],
      ['date' => '2015-03-02'],
      ['date' => '2013-03-10'],
      ['date' => '2013-03-01'],
    ];
  }
}
