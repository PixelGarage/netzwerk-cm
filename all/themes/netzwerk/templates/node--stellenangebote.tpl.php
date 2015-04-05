<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
  	<?php print render($title_prefix); ?>
		<?php if (!$page && $title): ?>
		<div>
			<h2<?php print $title_attributes; ?>><?php print $title ?></h2>
		</div>
		<?php endif; ?>
		<?php print render($title_suffix); ?>
    <?php
      print render($content);
    ?>
  </div>
</div>