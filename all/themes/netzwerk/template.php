<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */
function netzwerk_username_alter(&$name, $account) {
	$user = user_load($account->uid);
	if (!empty($user->field_fullname)) {
		$name = $user->field_fullname[LANGUAGE_NONE][0]['safe_value'];
	}
}
function netzwerk_textarea($variables) {
	$variables['element']['#resizable'] = FALSE;
  return theme_textarea($variables);
}

function netzwerk_date_display_range($variables) {
	$aux1 = strtotime($variables['dates']['value']['formatted_iso']);
	$aux2 = strtotime($variables['dates']['value2']['formatted_iso']);
	if (date('Y', $aux1) == date('Y', $aux2) && date('m', $aux1) == date('m', $aux2)) {
		return date('j', $aux1) . '. - ' . $variables['date2'];
	} else {
		return theme_date_display_range($variables);
	}
}
function netzwerk_taxonomy_block_list($variables) {
  $items = $variables['items'];

  $output = '<ul>';
  foreach($items as $key => $link) {
    $output .= '<li>' . $link . '</li>';
  }
  $query = new EntityFieldQuery();
	$count = $query->entityCondition('entity_type', 'node')
		->entityCondition('bundle', 'veranstaltungen')
		->propertyCondition('status', 1)
		->fieldCondition('field_date', 'value', date('Y-m-d') . ' 00:00:00', '>=')
		->count()->execute();
  $output .= '<li>' . l('Veranstaltungen (' . $count . ')', 'events') . '</li>';
  $output .= '</ul>';

  return $output;
}