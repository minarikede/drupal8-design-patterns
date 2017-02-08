<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\chain_of_responsabilities\Controller;

use Drupal\chain_of_responsabilities\Classes\HttpInMemoryCacheHandler;
use Drupal\chain_of_responsabilities\Classes\SlowDatabaseHandler;

use GuzzleHttp\Psr7;

class ChainOfResponsabilitiesController {
  public function page() {
    $ouput = array(
      'main_content' => array(
        '#theme' => 'cor_content',
      ),
    );
    $this->chain = new HttpInMemoryCacheHandler(
      ['/design-patterns/cer?index=1' => 'Hello In Memory!'],
      new SlowDatabaseHandler()
    );

    $request = new Psr7\Request('GET', "/design-patterns/cer?index=1", [], '', '1.1');
    $ouput[] = array(
      '#markup' => '<br />' . $this->chain->handle($request),
    );

    $request = new Psr7\Request('GET', "/design-patterns/cer", [], '', '1.1');
    $ouput[] = array(
      '#markup' => '<br />' . $this->chain->handle($request),
    );
    return $ouput;
  }
}
