<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\adapter_pattern\Controller;

use Drupal\adapter_pattern\Classes\Book;
use Drupal\adapter_pattern\Classes\EBookAdapter;
use Drupal\adapter_pattern\Classes\Kindle;

class AdapterPatternController {

  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'adapter_pattern_content',
      ),
    );

    $book = new Book();
    $book->open();
    $book->turnPage();
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => t('Book'),
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => t('We are on page: @page', ['@page' => $book->getPage()]),
    ];
    $kindle = new Kindle();
    $ebook = new EBookAdapter($kindle);

    $ebook->open();
    $ebook->turnPage();
    $ebook->turnPage();
    $ebook->turnPage();
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => t('EBook'),
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => t('We are on page: @page', ['@page' => $ebook->getPage()]),
    ];
    return $output;
  }
}
