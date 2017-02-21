<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\strategy_pattern\Controller;

use Drupal\strategy_pattern\Comparator\DateComparator;
use Drupal\strategy_pattern\Comparator\IdComparator;
use Drupal\strategy_pattern\Comparator\ObjectCollection;


use Drupal\strategy_pattern\Ducks\MallardDuck;
use Drupal\strategy_pattern\Ducks\DecoyDuck;
use Drupal\strategy_pattern\Ducks\ModelDuck;
use Drupal\strategy_pattern\Ducks\RubberDuck;
use Drupal\strategy_pattern\Ducks\FlyRocketPowered;

class StrategyPatternController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'strategy_pattern_content',
      ),
    );

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => t('Comparator'),
    ];

    $integers = $this->provideIntegers();
    $obj = new ObjectCollection($integers);
    $obj->setComparator(new IdComparator());
    $elements = $obj->sort();
    $elements_array = array_map(function ($value) {
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
    $elements_array = array_map(function ($value) {
      return $value['date'];
    }, $elements);
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'Sorted dates: ' . implode(', ', $elements_array),
    ];


    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => t('Ducks'),
    ];


    $mallard = new MallardDuck();
    $rubberDuckie = new RubberDuck();
    $decoy = new DecoyDuck();
    $model = new ModelDuck();

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Mallard Duck: {$mallard->performQuack()}"
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Decoy Duck: {$decoy->performQuack()}"
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Rubber Duck: {$rubberDuckie->performQuack()}"
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Model Duck: {$model->performQuack()}"
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Model Duck: {$model->performFly()}"
    ];

    $model->setFlyBehavior(new FlyRocketPowered());

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Model Duck: {$model->performFly()}"
    ];

    return $output;
  }

  public function provideIntegers() {
    return [['id' => 21], ['id' => 13], ['id' => 31]];
  }

  public function providateDates() {
    return [
      ['date' => '2014-03-03'],
      ['date' => '2015-03-02'],
      ['date' => '2013-03-10'],
      ['date' => '2013-03-01'],
    ];
  }
}
