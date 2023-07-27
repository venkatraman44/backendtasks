<?php

namespace Drupal\task1\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\taxonomy\Entity\Term;
use Drupal\user\Entity\User;
use Drupal\node\Entity\Node;

/**
 * Use of our custom service.
 */
class CustomControllerTwo extends ControllerBase {

  /**
   * Function task1.
   */
  public function task2() {
    $node = Node::load(1);
    if ($node instanceof EntityInterface && $node->bundle() === 'shapes') {
      $shape = $node->getTitle();
      $color_term = $node->get('field_color')->entity;
      $term = '';
      if ($color_term instanceof Term) {
        $term = $color_term->getName();
        $user_entity = $color_term->get('field_gil')->entity;
        $user = '';
        if ($user_entity instanceof User) {
          $user = $user_entity->getDisplayName();
        }
      }
      $build = [
        '#markup' => "$shape $term $user",
      ];
      return $build;
    }
  }

}
