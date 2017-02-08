<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.29.
 * Time: 22:09
 */

namespace Drupal\pool_pattern\Controller;

use Drupal\pool_pattern\Classes\WorkerPool;
use Drupal\pool_pattern\Classes\StringReverseWorker;

class PoolPatternController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'pool_pattern_content',
      ),
    );

    $pool = new WorkerPool();
    $worker1 = $pool->get();
    $worker2 = $pool->get();

    $occupiedWorkers = $pool->countOccupiedWorkers();
    $freeWorkers = $pool->countFreeWorkers();

    $output[]['#markup'] = "<br />The pool contains {$occupiedWorkers} occupied workers and {$freeWorkers} freeworkers";
    $worker3 = $pool->get();
    $occupiedWorkers = $pool->countOccupiedWorkers();
    $freeWorkers = $pool->countFreeWorkers();

    $output[]['#markup'] = "<br />The pool contains {$occupiedWorkers} occupied workers and {$freeWorkers} freeworkers";
    $pool->dispose($worker2);
    $occupiedWorkers = $pool->countOccupiedWorkers();
    $freeWorkers = $pool->countFreeWorkers();

    $output[]['#markup'] = "<br />The pool contains {$occupiedWorkers} occupied workers and {$freeWorkers} freeworkers";

    $worker4 = $pool->get();
    $occupiedWorkers = $pool->countOccupiedWorkers();
    $freeWorkers = $pool->countFreeWorkers();

    $output[]['#markup'] = "<br />The pool contains {$occupiedWorkers} occupied workers and {$freeWorkers} freeworkers";

    return $output;
  }

}
