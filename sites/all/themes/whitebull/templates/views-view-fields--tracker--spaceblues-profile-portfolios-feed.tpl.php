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
		$nid = $fields['nid']->content;
		
        $image = $fields['media_gallery_media']->content;
        preg_match_all('/<img[^>]+>/i',$image, $imageResult);
        
        $no_image = '<img src="sites/all/themes/whitebull/images/home.png">';

        $description = $fields['media_gallery_description']->content;

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
	         $description = $fields['media_gallery_description']->content;
         } else {
	         $description = 'See more';
         }    
?> 
<div class="user-profile-portfolios" data-value="0">
	<div><a href="node/<?php print $nid; ?>"><div class="user-profile-portfolios-item"><?php print $thumbnail; ?></div></a></div>
	<div><a href="node/<?php print $nid; ?>"><div class="user-profile-portfolios-item"><?php print $thumbnail2; ?></div></a></div>
	<div><a href="node/<?php print $nid; ?>"><div class="user-profile-portfolios-item"><?php print $description; ?></div></a></div>
</div>
