<?php

/* variables for the user profile from profile2 'main' type */
function zen_spaceblues_preprocess_user_profile(&$variables, $hook) {
	foreach ($variables['user_profile']['profile_main']['view']['profile2'] as $user_profile_detail) {
	  $variables['user_birthday'] = $user_profile_detail['field_user_birthday'];
	  $variables['user_gender'] = $user_profile_detail['field_user_gender'];
	  $variables['user_location'] = $user_profile_detail['field_user_location'];
	  $variables['user_comments'] = $user_profile_detail['field_user_comments'];
	  		}
}


/* change the markup from <li> to <div> in menus */
function zen_spaceblues_menu_tree__menu_block__1($variables) {
if (preg_match("/\buser-submenu\b/i", $variables['tree'])){
    return '<div id="user-menu-items" class="menu user-menu">' . $variables['tree'] . '</div>';
  } else {
    return '<div id="user-menu-account" class="menu user-submenu">' . $variables['tree'] . '</div>';
  }
}
function zen_spaceblues_menu_link__menu_block__1(array $variables) {
	$element = $variables['element'];
	$sub_menu = '';


	$name_id = strtolower(strip_tags($element['#title']));
	// remove colons and anything past colons
	if (strpos($name_id, ':')) $name_id = substr ($name_id, 0, strpos($name_id, ':'));
	//Preserve alphanumerics, everything else goes away
	$pattern = '/[^a-z]+/ ';
	$name_id = preg_replace($pattern, '', $name_id);
	$element['#attributes']['class'][] = 'menu-' . $element['#original_link']['mlid'] . ' '.$name_id;
	
		if ($element['#below']) {
			$sub_menu = drupal_render($element['#below']);
		}
  

	$output = l($element['#title'], $element['#href'], $element['#localized_options']);
	return '<div' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</div>\n";
}

/* let's fuck up the user signature */
function zen_spaceblues_user_signature($variables) {
  $signature = $variables['signature'];
  $output = '';

  if ($signature) {
    $output .= '<div class="user-signature"></div>';
    $output .= $signature;
    $output .= '</div>';
  }

  return $output;
}