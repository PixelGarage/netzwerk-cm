<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      if ($node->nid == 1) {
      	$content['webform']['#weight'] = -100;
      }
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <div class="links node-links clearfix"><?php print render($content['links']); ?></div>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
</div>