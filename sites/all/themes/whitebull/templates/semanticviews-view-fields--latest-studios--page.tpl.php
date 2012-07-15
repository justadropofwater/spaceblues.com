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
        $image = $fields['media_gallery_media']->content;
        preg_match_all('/<img[^>]+>/i',$image, $imageResult);
        $no_image = '<img src="sites/all/themes/whitebull/images/home.png">';
        // print $field->content;

        if ($imageResult[0] == null) {
            $thumbnail = $no_image;
        } else {
            $thumbnail = $imageResult[0][0];
         } 

		$body = $fields['body']->content; 
		$description = $fields['media_gallery_description']->content;
		
		if ($description != null) {
			$teaser = $description;
		} elseif ($body != null) {
			$teaser = $body;
		} else {
			$teaser = '<div class="error">Well, shit...something broke.</div>';
		}
?>        
 
<div class="element">
	<div class="thumbnail">
		<?php print $thumbnail; ?>
	</div>
    <div class="overlay" style="display: none; ">
        <div class="overlay-title">
        	<a href="/node/<?php print $fields['nid']->raw; ?>" id="more" class="controls">
	        	<?php print $fields['title']->raw; ?>
	        </a>
	    </div>
	    <div class="overlay-body">
	    	<?php print $teaser; ?>
	    	<?php print $body; ?>
	    </div>
    </div>
    
</div>
