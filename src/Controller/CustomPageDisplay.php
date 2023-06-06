<?php


namespace Drupal\d10_custom_form_autocomplete\Controller;

use Drupal\Core\Controller\ControllerBase;

class CustomPageDisplay extends ControllerBase {

  public function autocomplete_display() {

	  $form = \Drupal::formBuilder()->getForm('Drupal\d10_custom_form_autocomplete\Form\MyCustomAutocompleteForm');
	  return [
	  	'#title' => "Custom form With Autocomplete fields",
	    '#type' => 'markup',
	    '#markup' => \Drupal::service('renderer')->render($form)
	  ];
  }
}