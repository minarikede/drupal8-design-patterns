<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\data_mapper_pattern\Controller;

use Doctrine\Common\Proxy\Exception\InvalidArgumentException;
use Drupal\data_mapper_pattern\Classes\StorageAdapter;
use Drupal\data_mapper_pattern\Classes\UserMapper;
class DataMapperPatternController {

  public function page() {
    $output = [
      'main_content' => [
        '#theme' => 'data_mapper_pattern_content',
      ]
    ];

    $storage = new StorageAdapter([1 => ['username' => 'domnikl', 'email' => 'liebler.dominik@gmail.com']]);
    $mapper = new UserMapper($storage);

    $user_ids = [1, 2];
    foreach ($user_ids as $id) {
      try {
        $user = $mapper->findById($id);
        $output[] = [
          '#type' => 'html_tag',
          '#tag' => 'p',
          '#value' => t('User with user id: @user_id username: @username, email address: @email',
            [
              '@user_id' => $id,
              '@username' => $user->getUsername(),
              '@email' => $user->getEmail(),
            ])
        ];
      }
      catch (\InvalidArgumentException $e) {
        $output[] = [
          '#type' => 'html_tag',
          '#tag' => 'p',
          '#value' => $e->getMessage(),
        ];
      }
    }
    return $output;
  }
}
