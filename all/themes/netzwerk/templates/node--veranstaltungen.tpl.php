<div<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <div>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  </div>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($display_submitted): ?>
  <div class="submitted"><?php print $date; ?> -- <?php print $name; ?></div>
  <?php endif; ?>  
  
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      if ($page) {
      	$tab_titles = array();
      	$tab_contents = array();
      	$tabs = array('body', 'field_ort', 'field_fotos', 'field_downloads');
      	foreach ($tabs as $delta => $t) {
      		if (!empty($content[$t]['#title'])) {
						hide($content[$t]);
						$tab_titles[] = '<li><a href="#tab_delta_' . $delta . '">' . $content[$t]['#title'] . '</a></li>';
						$content[$t]['#label_display'] = 'hidden';
						if ($t == 'field_ort') {
							$c = '<div id="tab_delta_' . $delta . '">';
							$ort = urlencode($node->field_ort[LANGUAGE_NONE][0]['safe_value']);
							$c .= '<a href="http://maps.google.com/maps?q=' . $ort . '" target="_blank"><img src="http://maps.googleapis.com/maps/api/staticmap?center=' . $ort . '&markers=' . $ort . '&zoom=14&size=608x300&maptype=roadmap&sensor=false" alt="Map" /></a>';
							$c .= '</div>';
							$tab_contents[] = $c;
						} else {
							$tab_contents[] = '<div id="tab_delta_' . $delta . '">' . render($content[$t]) . '</div>';
						}
					}
      	}
      	if ($node->sticky && strtotime($node->field_date[LANGUAGE_NONE][0]['value2']) > time()) {
      		$wb_block = module_invoke('webform', 'block_view', 'client-form-68');
      		$tab_titles[] = '<li><a href="#tab_delta_anmeldeformular">' . $wb_block['subject'] . '</a></li>';
      		$tab_contents[] = '<div id="tab_delta_anmeldeformular">' . render($wb_block['content']) . '</div>';
      	}
      	print render($content);
      	echo '<div id="page-content-tabs">' . PHP_EOL . '<ul>' . PHP_EOL . implode(PHP_EOL, $tab_titles) . PHP_EOL . '</ul>' . PHP_EOL;
      	echo implode(PHP_EOL, $tab_contents) . PHP_EOL;
      	echo '</div>';
				echo '<div class="go_back">' . l('&lt; ' . t('all Events'), 'events', array('html' => true)) . '</div>' . PHP_EOL;
      } else {
      	print render($content);
      }
    ?>
  </div>
  
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <div class="links node-links clearfix"><?php print render($content['links']); ?></div>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
</div>