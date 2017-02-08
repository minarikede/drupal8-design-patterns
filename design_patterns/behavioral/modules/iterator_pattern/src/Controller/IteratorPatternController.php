<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\iterator_pattern\Controller;

use Drupal\iterator_pattern\Classes\BookList;
use Drupal\iterator_pattern\Classes\Book;
class IteratorPatternController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'iterator_pattern_content',
      ),
    );
    $book_1 = new Book('Learning PHP Design Patterns', 'William Sanders');
    $book_2 = new Book('Professional Php Design Patterns', 'Aaron Saray');
    $book_3 = new Book('Clean Code', 'Robert C. Martin');

    $bookList = new BookList();
    $bookList->addBook($book_1);
    $bookList->addBook($book_2);
    $bookList->addBook($book_3);

    $books = $bookList->getAllAuthorsAndTitles();
    $output[] = array(
      '#markup' => '<h2>Book list with ' . $bookList->count() . ' books:</h2>',
    );
    $output[] = array(
      '#markup' => implode('<br />' , $books),
    );

    $bookList->removeBook($book_2);
    $books = $bookList->getAllAuthorsAndTitles();
    $output[] = array(
      '#markup' => '<h2>Book list with a removed book:</h2>',
    );
    $output[] = array(
      '#markup' => implode('<br />' , $books),
    );

    return $output;
  }
}
