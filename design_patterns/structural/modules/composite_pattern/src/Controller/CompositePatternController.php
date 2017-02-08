<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\composite_pattern\Controller;

use Drupal\composite_pattern\Classes\InputElement;
use Drupal\composite_pattern\Classes\TextElement;
use Drupal\composite_pattern\Classes\Form;

class CompositePatternController {

  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'composite_pattern_content',
      ),
    );
    $form = new Form();
    $form->addElement(new TextElement('Email:'));
    $form->addElement(new InputElement());
    $embed = new Form();
    $embed->addElement(new TextElement('Password:'));
    $embed->addElement(new InputElement());
    $form->addElement($embed);

    $output[] = [
      '#markup' => $form->render(),
      '#allowed_tags' => ['form', 'input'],
    ];
    return $output;
  }
}
