<?php
/**
 * @file
 * this is a template file
 */

/**
 * This is to call the jQuery Cycle JavaScript.
 *
 * Implements hook_preprocess_HOOK()
 *
 * The name of the template being rendered ("html" in this case.)
 */



/**
 * This is for maintenance page.
 *
 * Implements hook_preprocess_HOOK()
 *
 * The name of the template being rendered ("maintenance_page" in this case.)
 */
function whitebull_preprocess_maintenance_page(&$variables) {
  if (!$variables['db_is_active']) {
    unset($variables['site_name']);
  }
  drupal_add_css(drupal_get_path('theme', 'whitebull') . '/styles/maintenance.css');
}


function whitebull_preprocess_page(&$variables) {
  $nid = arg(1);
        if (arg(0) == 'node' && is_numeric($nid)) {
          if (isset($variables['page']['content']['system_main']['nodes'][$nid])) {
            $variables['node_content'] = & $variables['page']['content']['system_main']['nodes'][$nid];
          }

        }
  }