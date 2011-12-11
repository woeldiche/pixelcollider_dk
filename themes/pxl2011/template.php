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


/**
 * Implements hook_breadcrumb().
 *
 * Add the current page title to the end of the breadcrumb.
 */
function pxl2011_breadcrumb($variables) {
  $output = '';
  $breadcrumb = $variables['breadcrumb'];

  // Provide a navigational heading to give context for breadcrumb links to
  // screen-reader users. Make the heading invisible with .element-invisible.
  $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
  $output .= implode(' / ', $breadcrumb);

  return $output;
}

/**
 * Implements hook_preprocess_region().
 *
 * Makes breadcrumb,title and tabs available in content region for printing.
 */
function pxl2011_alpha_preprocess_region(&$vars) {
  if (in_array($vars['elements']['#region'], array('breadcrumb','sidebar_second'))) {
    $theme = alpha_get_theme();
    
    switch ($vars['elements']['#region']) {
      case 'breadcrumb':
        $vars['attributes_array']['class'][] = 'breadcrumbs';
        $vars['breadcrumb'] = $theme->page['breadcrumb'];
        break;
      case 'sidebar_second':
        $vars['site_slogan'] = $theme->page['site_slogan'];      
        $vars['site_slogan_hidden'] = $theme->page['site_slogan_hidden'];
        $vars['attributes_array']['class'][] = 'text-aside';
        break;
    }
  }
}


/**
 * Implements hook_process_region().
 *
 * Makes breadcrumb,title and tabs available in content region for printing.
 */
function pxl2011_alpha_process_region(&$vars) {
  if (in_array($vars['elements']['#region'], array('breadcrumb'))) {
    $theme = alpha_get_theme();
    
    switch ($vars['elements']['#region']) {
      case 'breadcrumb':
        break;
    }
  }
}

/**
 * Implements hook_menu_local_tasks().
 */
function pxl2011_menu_local_tasks(&$vars) {
  $output = '';

  if (!empty($vars['primary'])) {
    $vars['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $vars['primary']['#prefix'] .= '<ul class="pills primary clearfix">';
    $vars['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($vars['primary']);
  }
  if (!empty($vars['secondary'])) {
    $vars['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $vars['secondary']['#prefix'] .= '<ul class="pills secondary clearfix">';
    $vars['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($vars['secondary']);
  }

  return $output;
}

/**
 * Implements template_preprocess_field.
 *
 * Style selected field to appear like blocks.
 */
function pxl2011_preprocess_field(&$vars, $hook) {
  switch ($vars['element']['#field_name']) {
    case 'field_tasks':
       $vars['theme_hook_suggestions'][] = 'field__taxonomy_list';
       $vars['classes_array'] = array();
       //$vars['classes_array'][] = 'text-secondary';
       $vars['classes_array'][] = 'slash-list';
      break;
    case 'field_status':
      $vars['classes_array'] = array();
      //$vars['classes_array'][] = 'text-secondary';
      break;
      
    case 'field_link': 
      $vars['classes_array'] = array();
      $vars['classes_array'][] = 'slashed';
          
    default:
      break;
  }
}
