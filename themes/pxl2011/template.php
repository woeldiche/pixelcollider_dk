<?php

/**
 * @file
 */
 
 /**
 * Implements hook_preprocess_page().
 * Insert Typekit code in $script if enabled in theme settings.
 */
function pxl2011_preprocess_page(&$vars) {
  // Check if typekit is enables and an ID has been defined.
  if (theme_get_setting('typekit_kit_id') != '' && theme_get_setting('typekit_enable') == '1') {
    // Create url to js
    $typekit_url = '//use.typekit.com/' . theme_get_setting('typekit_kit_id') .'.js';
    // Add Typekit js.
    drupal_add_js($typekit_url,
      array('type' => 'external', 'scope' => 'header', 'weight' => 9)
    );
    drupal_add_js('try{Typekit.load();}catch(e){}',
      array('type' => 'inline', 'scope' => 'header', 'weight' => 10)
    );
  };
}