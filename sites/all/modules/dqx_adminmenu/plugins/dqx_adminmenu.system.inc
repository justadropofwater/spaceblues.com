<?php


/**
 * Implements hook_dqx_adminmenu_items()
 */
function system_dqx_adminmenu_items() {
  $items = _dqx_adminmenu_router_items("path LIKE 'admin/%%'  OR  path = 'admin'");

  unset($items['admin/by-module']);
  unset($items['admin/by-task']);
  unset($items['admin/compact']);

  return $items;
}


/**
 * Implements hook_dqx_adminmenu_items_alter()
 */
function system_dqx_adminmenu_items_alter($items) {

  $items->itemSetTitle('admin/appearance/update', t('Update themes'));
  $items->itemSetTitle('admin/appearance/list', t('List available themes'));
  $items->itemSetTitle('admin/appearance/settings', t('Theme settings'));
}


/**
 * Implements hook_dqx_adminmenu_structure_alter()
 */
function system_dqx_adminmenu_structure_alter($structure) {
  $structure->submenuSetInlineChild('admin/appearance', 'admin/appearance/settings');
  $structure->submenuSetInlineChild('admin/config/content', 'admin/config/content/formats');
  $structure->submenuSetInlineChild('admin/config/search', 'admin/config/search/path');
}

