<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 16:27
 */

namespace Drupal\facade_pattern\Controller;

use Drupal\facade_pattern\Classes\Bios;
use Drupal\facade_pattern\Classes\Os;
use Drupal\facade_pattern\Classes\Facade;

class FacadePatternController {
  public function page() {
    $page[] = $this->getIntroduction();

    $bios = new Bios();
    $os = new Os();

    $facade = new Facade($bios, $os);

    $page[] = array(
      '#theme' => 'item_list',
      '#items' => $facade->turnOn(),
    );

    $page[] = array(
      '#theme' => 'item_list',
      '#items' => $facade->turnOff(),
    );

    return $page;

  }

  private function getIntroduction() {
    $path = drupal_get_path('module', 'facade_pattern');
    return array(
      array(
        '#type' => 'html_tag',
        '#tag' => 'h1',
        '#value' => 'Facade pattern',
      ),
      array(
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'The primary goal of a Facade Pattern is not to avoid you to read the
manual of a complex API. It\'s only a side-effect. The first goal is to
reduce coupling and follow the Law of Demeter.',
      ),
      array(
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'A Facade is meant to decouple a client and a sub-system by embedding
many (but sometimes just one) interface, and of course to reduce
complexity.',
      ),
      array(
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => "-  A facade does not forbid you the access to the sub-system<br />
    -  You can (you should) have multiple facades for one sub-system",
      ),
      array(
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => ' That\'s why a good facade has no ``new`` in it. If there are multiple
creations for each method, it is not a Facade, it\'s a Builder or a
[Abstract\|Static\|Simple] Factory [Method].',
      ),
      array(
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'The best facade has no ``new`` and a constructor with
interface-type-hinted parameters. If you need creation of new instances,
use a Factory as argument.',
      ),
      array(
        '#theme' => 'image',
        '#uri' => "{$path}/images/uml.png",
      ),
    );
  }
}
