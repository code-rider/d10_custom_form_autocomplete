<?php

namespace Drupal\d10_custom_form_autocomplete\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

class FormAutoComplete extends ControllerBase{

  public function custom_engine(){
    $requestedData = \Drupal::request();
    $text = $requestedData->query->get('q');

    $queryCry = \Drupal::entityQuery('taxonomy_term')
    ->accessCheck(FALSE)
    ->condition('vid', 'distributions')
    ->condition('status', 1)
    ->condition('name.value', '%'.$text.'%', 'like');
    $queryResult = $queryCry->execute();
    $cryNids = array();
    if (count($queryResult) > 0) {
      $cryNids = array_values($queryResult);
    }
    $results = [];
    foreach($cryNids as $tid){
      $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
      $results[] = [
        'label' => $this->t($term->name->value),
        'value' => $this->t($term->name->value) . ' ('.$tid.')'
      ];

    }
           
    return new JsonResponse($results);
    
  }
}