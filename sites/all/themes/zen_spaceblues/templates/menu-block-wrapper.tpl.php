<?php
/**
 * @file
 * Default theme implementation to wrap menu blocks.
 *
 * Available variables:
 * - $content: The renderable array containing the menu.
 * - $classes: A string containing the CSS classes for the DIV tag. Includes:
 *   menu-block-DELTA, menu-name-NAME, parent-mlid-MLID, and menu-level-LEVEL.
 * - $classes_array: An array containing each of the CSS classes.
 *
 * The following variables are provided for contextual information.
 * - $delta: (string) The menu_block's block delta.
 * - $config: An array of the block's configuration settings. Includes
 *   menu_name, parent_mlid, title_link, admin_title, level, follow, depth,
 *   expanded, and sort.
 *
 * @see template_preprocess_menu_block_wrapper()
 */
?>
<div id="user-menu" class="<?php print $classes; ?>">
<?php 
	global $user;
	if ($user->uid != 0):
	$user = user_load($user->uid);
	print render($content);
	print '<div id="user-menu-avatar">';
	if($user->picture){
		print theme_image_style(
			array(
				'style_name' => 'user_avatar_header',
				'path' => $user->picture->uri,
				//'alt' =>	$alt,
				'width' => NULL,
				'height' => NULL,
				'attributes' => array(
					'class' => 'avatar'
				)			 
			)
		); 
	} else {
		print '<div id="user-menu-user">' . ' <a href="' . url('user/' . $user->uid) . '">' . '<img src="' . $base_path . 'sites/all/themes/whitebull/images/no-avatar-header.png" /></a></div>';
	}	  
	print '</div></div>';
	
	                  else:
                                    print '<div class="login">' . t('login is ') . ' <a href="' . url('user') . '">' . t('here') . '</a></div>';
                                    print '<div class="register"> <a href="' . url('user/register') . '">' . t('register') . '</a></div>';
                                    endif;
?>
</div>

