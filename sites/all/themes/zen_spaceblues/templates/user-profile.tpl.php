<?php

/*
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 */
 
?>
	<?php 
		$profile_uid = $elements['#account']->uid; 
		$account = user_load($profile_uid);
		$profile = profile2_load_by_user($account);
		$follow = flag_get_flag('follow') or die('no "follow" flag');
		$favorite = flag_get_flag('favorite') or die('no "favorite" flag');
	?>
<div id="main-profile" class="main-profile-detail"<?php print $attributes; ?>>
	<div id="main-profile-wrapper">
		<div id="main-profile-1">
			<div class="main-profile-avatar">
				<?php 
					print render($user_profile['user_picture']); 
				?>
			</div>
		</div>	
		<?php	/* profile details */ ?>
		<div id="main-profile-2">
			<div class="main-profile-name">
				<?php
					print render($user_name);	
				?>
			</div>
			<div class="main-profile-birthday">
				<?php
					print render($user_birthday);
				?>		
			</div>
			
			<div class="main-profile-gender">
				<?php
					print render($user_gender);
				?>		
			</div>
		</div>
		<div id="main-profile-4">
			<div class="main-profile-actions">
				<div class="main-profile-follow">
					<?php 
						print flag_create_link('follow', $profile_uid);
						print "Has " . $follow->get_count($profile_uid) . " followers.";
					?>
				</div>    
				<div class="main-profile-privatemsg">
					<?php
		  			print render($user_profile['privatemsg_send_new_message']);
					?>
				</div>
			</div>
			
			<div class="main-profile-activity">
				<?php
					print format_plural($follow->get_user_count($account->uid),
					    'This user is following 1 other user.',
					    'This user is following @count users.');
					echo '<br>';
					print format_plural($favorite->get_user_count($account->uid),
					    'Only 1 Portfolio is this user\'s favorite.',
					    '@count Portfolios are this user\'s favorite.');	    
				?>
			</div>
		</div>
				<div id="main-profile-3">
			<div class="main-profile-location">
				<?php 
					print render($user_location);
				?>
			</div>
		</div>	
		<div class="main-profile-comments">
	
		</div>
	</div>
</div>
