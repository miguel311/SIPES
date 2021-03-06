<?php

/**
 * @file
 * The theme include file for the elements module.
 *
 * Contains the theme functions for all the elements module elements.
 */

/**
 * Returns HTML for a numberfield form element.
 *
 * @param $variables
 *   An associative array containing:
 *   - element: An associative array containing the properties of the element.
 *     Properties used: #title, #value, #description, #min, #max, #placeholder,
 *     #required, #attributes, #step.
 *
 */
function theme_numberfield($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'number';
  element_set_attributes($element, array('id', 'name', 'value', 'step', 'min', 'max', 'placeholder'));
  _form_set_class($element, array('form-text', 'form-number'));

  $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

  return $output;
}
