<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php
// kpr($fields); 
?>

<?php
//portfolio objects
		$nid = $fields['nid']->content;
		$title = $fields['title']->content;
		$comment_count = $fields['comment_count']->content;
		$add_comment = $fields['comments_link']->content;
        $image = $fields['media_gallery_media']->content;
        $favorite = $fields['ops']->content;
        $favorite_count = $fields['count']->content;
        $category = $fields['field_category']->content;
        $tags = $fields['field_tags']->content;
// user objects
        $author_picture = $fields['picture']->content;
        $author_signature = $fields['signature']->content;
        $author_name = $fields['name']->content;

        $description = $fields['media_gallery_description']->content;

        
        preg_match_all('/<img[^>]+>/i',$image, $imageResult);
        
        $no_image = '<img src="sites/all/themes/whitebull/images/home.png">';


        if ($imageResult[0] == null) {
            $thumbnail = $no_image;
        } else {
            $thumbnail = $imageResult[0][0];
         }
         if ($imageResult[0][1] != null) {
	         $thumbnail2 = $imageResult[0][1];
         } else {
	         $thumbnail2 = $no_image;
         }
        
         if ($description != null) {
	         $description = $description;
         } else {
	         $description = 'See more...';
         }    
?> 
<div class="browse-portfolios">
	<div class="browse-portfolios-thumbnails" data-value="0">
		<div class="slides"><a href="../node/<?php print $nid; ?>"><div class="browse-portfolios-item"><?php print $thumbnail; ?></div></a></div>
		<div class="slides"><a href="../node/<?php print $nid; ?>"><div class="browse-portfolios-item"><?php print $thumbnail2; ?></div></a></div>
	</div>
	<br>
	<div class="browse-portfolios-details">
		<div><a href="../node/<?php print $nid; ?>"><div class="browse-portfolios-item"><?php print $title; ?></div></a></div>
		<div><div class="browse-portfolios-item category">Category: <?php print $category; ?></div></div>
		<div><div class="browse-portfolios-item"><?php print $description; ?></div></div>
	</div>
	<div class="browse-portfolios-actions">
		<div class="browse-portfolios-comment-count">
			<div class="text">
				<a href="../node/<?php print $nid; ?>">
					<?php print $comment_count; ?>
				</a>
			</div>
		</div>
		<div class="browse-portfolios-favorite-count">
			<div class="text">
			<?php print $favorite_count; ?>
			</div>
		</div>	
	</div>
</div>	