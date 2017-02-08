<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\visitor_pattern\Controller;

use Drupal\visitor_pattern\Classes\Visitor;
use Drupal\visitor_pattern\Classes\User;
use Drupal\visitor_pattern\Classes\Group;
use Drupal\visitor_pattern\Classes\RoleVisitor;
use Drupal\visitor_pattern\Classes\Role;

class VisitorPatternController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'visitor_pattern_content',
      ),
    );
    $visitor = new RoleVisitor();
    $role1 = new User('Dominik');
    $role2 = new Group('Administrators');

    $role1->accept($visitor);


    $visitors = array_map(function($value) {
      return $value->getName();
    }, $visitor->getVisited());
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'Accept visitor: ' . implode(', ', $visitors),
    ];

    $role2->accept($visitor);

    $visitors = array_map(function($value) {
      return $value->getName();
    }, $visitor->getVisited());
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'Accept visitor: ' . implode(', ', $visitors),
    ];
    return $output;
  }
}
