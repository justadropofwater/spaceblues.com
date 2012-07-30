<?php 
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<div id="portfolio-info">
		<div class="portfolio-author">
			<div class="portfolio-author-avatar">
			<?php
			
			$node = $variables['node'];
$author = user_load($node->uid);
				print '<div>';
	if($user->picture){
		print theme_image_style(
			array(
				'style_name' => 'user_avatar_header',
				'path' => $author->picture->uri,
				//'alt' =>	$alt,
				'width' => NULL,
				'height' => NULL,
				'attributes' => array(
					'class' => 'avatar'
				)			 
			)
		); 
	} else {
		print '<div>' . ' <a href="' . url('user/' . $user->uid) . '">' . '<img src="' . $base_path . 'sites/all/themes/whitebull/images/no-avatar-header.png" /></a></div>';
	}	  
	print '</div>'
				?>
			</div>
            <div class="portfolio-author-name"><?php print t('!username',array('!username' => $name)); ?></div>
		</div>
		<div class="portfolio-taxonomy">
	         <div class="portfolio-taxonomy-category">
                <?php
                  //  echo 'This studio is in ';
                    print '<div class="portfolio-taxonomy-category-label">Category: </div>' . render($content['field_category']) . '';
                ?>
             </div>
             <div class="portfolio-taxonomy-tags">
	             <?php
	             	print render($content['field_tags']);
	             ?>
             </div>
        </div>
        <div class="portfolio-links">
     <?php
            if ($teaser || !empty($content['comments']['comment_form'])):
                unset($content['links']['comment']['#links']['comment-add']);

            $links = render($content['links']);
            if ($links):
            endif;
        ?>
            <div class="links">
            <div class="flags">
    	        <div id="portfolio-favorite">
	    	        <?php
			            $favorite = flag_get_flag('favorite') or die('no "favorite" flag');
						print '<div class="favorite"><span class="favorite-icon-text">' . flag_create_link('favorite', $node->nid) . '</span></div>'; 
						print '<div class="favorite-count"><span class="favorite-count-text">' . $favorite->get_count($node->nid) . '</span></div>';
						?>
	            </div>
            </div>
            <div class="links-links">
                <?php print $links; ?>
            </div>
            </div>
        <?php endif; ?>
        </div>
	</div>
	<div id="portfolio-description">
	            <?php
                hide($content['comments']);
                hide($content['links']);
                hide($content['field_reverse_geolocation']);
                hide($content['field_category']);
                hide($content['media_gallery_media']);
            ?>
            <div class="left">
                <?php
                    print render($content);
                ?>
             </div>
	</div>
	<div id="portfolio-media">
		<?php
			print render($content['media_gallery_media']);
			?>
	</div>
  <div id="portfolio-comments">        
        <?php print render($content['comments']); ?>
  </div>      
</div>
