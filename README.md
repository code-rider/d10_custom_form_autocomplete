# Drupal 10 Custom Autocomplete Form
A module with a custom form with an example of Drupal 10 autocomplete form element
### Instructions
In this examle of module we are assuming we have a Taxonomy vocabulary created with machine name distributions
 change this name as per your need in FormAutoComplete.php and MyCustomAutocompleteForm.php
### Sample
```
$form['field_one'] = [
  '#title' => 'Field type entity_autocomplete',
  '#type' => 'entity_autocomplete',
  '#target_type' => 'taxonomy_term',
  '#selection_settings' => [
    'target_bundles' => array('distributions'),
  ],
  '#tags' => TRUE,
  '#default_value' => "",
  '#attributes' => [
    'placeholder' => t('Select Distribution'),
    'data-disable-refocus' => "true"
  ]
];
```
