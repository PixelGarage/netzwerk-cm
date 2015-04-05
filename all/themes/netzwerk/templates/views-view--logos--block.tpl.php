<?php
/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?>">
  <?php if ($view->tabs): ?>
    <div class="view-content">
    	<?php
    		$tab_titles = array();
      	$tab_contents = array();
      	foreach ($view->tabs as $delta => $tab) {
      		$tab_titles[] = '<li><a href="#tab_delta_' . $delta . '">' . $tab[0] . '</a></li>';
      		$tab_contents[] = '<div id="tab_delta_' . $delta . '" class="clearfix">' . $tab[1] . '</div>';
      	}
      	echo '<div id="page-content-tabs">' . PHP_EOL . '<ul>' . PHP_EOL . implode(PHP_EOL, $tab_titles) . PHP_EOL . '</ul>' . PHP_EOL;
      	echo implode(PHP_EOL, $tab_contents) . PHP_EOL . '</div>';
    	?>
    </div>
  <?php endif; ?>
</div>