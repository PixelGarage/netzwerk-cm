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
      hide($content['field_tabs']);
      print render($content);
      if ($page && !empty($node->field_tabs[LANGUAGE_NONE])) {
      	$tab_titles = array();
      	$tab_contents = array();
      	foreach ($node->field_tabs[LANGUAGE_NONE] as $delta => $data) {
      		$tab = field_collection_item_load($data['value']);
      		$tab_titles[] = '<li><a href="#tab_delta_' . $delta . '">' . $tab->field_title[LANGUAGE_NONE][0]['safe_value'] . '</a></li>';
      		$tab_content = empty($tab->field_body) ? '' : $tab->field_body[LANGUAGE_NONE][0]['safe_value'];
      		$tab_contents[] = '<div id="tab_delta_' . $delta . '">' . $tab_content . '</div>';
      	}
      	echo '<div id="page-content-tabs">' . PHP_EOL . '<ul>' . PHP_EOL . implode(PHP_EOL, $tab_titles) . PHP_EOL . '</ul>' . PHP_EOL;
      	echo implode(PHP_EOL, $tab_contents) . PHP_EOL . '</div>';
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