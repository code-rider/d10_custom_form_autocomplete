<?php

namespace Drupal\d10_custom_form_autocomplete\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Create report form.
 */
class MyCustomAutocompleteForm extends FormBase {
  
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'my_custom_autocomplete_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    
    /* -------- from item with autocomplete with taxonomy  ------ */
      
    $form['field_one'] = [
      '#title' => 'Field type entity_autocomplete',
      '#type' => 'entity_autocomplete',
      '#target_type' => 'taxonomy_term',
      '#selection_settings' => [
          'target_bundles' => array('distributions'),
      ],
      //'#title' => ('tags'),
      '#tags' => TRUE,
      '#default_value' => "",
      '#attributes' => [
        'placeholder' => t('Select Distribution'),
        'data-disable-refocus' => "true"
      ]
    ];

    /* -------- from item with autocomplete with taxonomy ------ */

    

    /* -------- from item Autocomplete with custom search in database ------ */

    $form['field_two'] = [
      '#title' => 'Text Field With custom path to autocomplete',
      '#type' => 'textfield',
      '#attributes' => [
        'placeholder' => t('Search by taxonomy'),
        'autocomplete'=> "OFF"
      ],
      '#autocomplete_route_name' => 'd10_custom_form_autocomplete.custom_autocomplete_engine',
    ];

    /* -------- from item Autocomplete with custom search in database ------ */


    $form['submit'] = [
      '#value' => t('Submit'),
      '#type' => 'submit'
    ];
    
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    
    $values = $form_state->getValues();

    // do somthing with form values
    print_r($values);
    die;

  }

}