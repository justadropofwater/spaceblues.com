<?php
/**
 * @file views-view-css-grid.tpl.php
 * view template to display output into a css grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
?>

<?php
  drupal_add_js('sites/all/themes/whitebull/scripts/homepage.isotope.js', 'file');
  drupal_add_js('sites/all/themes/whitebull/scripts/jquery.isotope.min.js', 'file');
?>

<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
  <div id="container">
<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
  </div>