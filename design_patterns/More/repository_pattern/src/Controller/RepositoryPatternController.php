<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\repository_pattern\Controller;
use Drupal\repository_pattern\Classes\MemoryStorage;
use Drupal\repository_pattern\Classes\Post;
use Drupal\repository_pattern\Classes\PostRepository;
class RepositoryPatternController {

  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'repository_pattern_content',
      ),
    );
    $repository = new PostRepository(new MemoryStorage());
    $post = new Post(NULL, 'Repository Pattern', 'Design Patterns PHP');
    $repository->save($post);
    $post = new Post(NULL, 'Esti Kornél', 'Kosztolányi Dezső');
    $repository->save($post);

    $ids = [1, 2, 3];
    foreach ($ids as $id) {
      try {
        $stored_post = $repository->findById($id);
        $output[] = [
          '#type' => 'html_tag',
          '#tag' => 'p',
          '#value' => (string) $stored_post,
        ];
      }
      catch (\OutOfRangeException $e) {
        $output[]['#markup'] = $e->getMessage();
      }
    }
    return $output;
  }
}
