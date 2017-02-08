<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\specification_pattern\Controller;

use Drupal\specification_pattern\Classes\PriceSpecification;
use Drupal\specification_pattern\Classes\OrSpecification;
use Drupal\specification_pattern\Classes\AndSpecification;
use Drupal\specification_pattern\Classes\Item;


class SpecificationPatternController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'specification_pattern_content',
      ),
    );
    $spec1 = new PriceSpecification(50, 99);
    $spec2 = new PriceSpecification(101, 200);

    $orSpec = new OrSpecification($spec1, $spec2);

    /**
     * OR SPEC.
     */
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h3',
      '#value' => 'OR specification - (50, 99) - (101, 200)',
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'OR specification for: 100',
    ];

    if ($orSpec->isSatisfiedBy(new Item(100))) {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'Is satisfied',
      ];
    }
    else {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'Not satisfied',
      ];
    }

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'OR specification for: 51',
    ];

    if ($orSpec->isSatisfiedBy(new Item(51))) {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'Is satisfied',
      ];
    }
    else {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'Not satisfied',
      ];
    }

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'OR specification for: 150',
    ];

    if ($orSpec->isSatisfiedBy(new Item(150))) {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'Is satisfied',
      ];
    }
    else {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'Not satisfied',
      ];
    }


    /**
     * AND spec.
     */
    $spec1 = new PriceSpecification(50, 150);
    $spec2 = new PriceSpecification(101, 200);
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h3',
      '#value' => 'AND specification - (50, 150) - (101, 200)',
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'AND specification for: 100',
    ];

    $andSpec = new AndSpecification($spec1, $spec2);
    if ($andSpec->isSatisfiedBy(new Item(100))) {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'Is satisfied',
      ];
    }
    else {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'Not satisfied',
      ];
    }


    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'AND specification for: 51',
    ];

    if ($andSpec->isSatisfiedBy(new Item(51))) {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'Is satisfied',
      ];
    }
    else {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'Not satisfied',
      ];
    }

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'AND specification for: 150',
    ];

    if ($andSpec->isSatisfiedBy(new Item(150))) {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'Is satisfied',
      ];
    }
    else {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'Not satisfied',
      ];
    }

    return $output;
  }
}
