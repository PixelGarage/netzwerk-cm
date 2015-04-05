<?php
/**
 * @file views-view-list.tpl.php
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
 	$c = $list_type_prefix;
 	foreach ($rows as $id => $row) {
 		$c .= '<li class="' . $classes_array[$id] . '">' . $row . '</li>';
 	}
 	$c .= $list_type_suffix;
 	if (!isset($view->tabs)) {
	 	$view->tabs = array();
	}
	$view->tabs[] = array($title, $c);
