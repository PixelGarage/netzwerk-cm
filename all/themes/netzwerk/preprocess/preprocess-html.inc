<?php
function netzwerk_alpha_preprocess_html(&$vars) {
	drupal_add_css('http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300', array('type' => 'external', 'group' => CSS_THEME, 'weight' => -100));
}