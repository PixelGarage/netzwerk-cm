<article<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <?php unset($content['links']['comment']); $content['links']['node']['#links']['node-readmore']['title'] .= ' &gt;' ?>
  <?php print render($content['field_picture']); ?>
  <header>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($display_submitted): ?>
  <footer class="submitted">
  	<?php print $name; ?> - <?php print format_date($node->created, 'custom', 'j. F Y'); ?> - <strong><?php echo format_plural($node->comment_count, '1 comment', '@count comments'); ?> -</strong>
  	<?php print render($content['field_category']); ?>
  </footer>
  <?php endif; ?>
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
    <?php endif; ?>
    <?php print render($content['comments']); ?>
  </div>
	<?php if ($page): ?>
		<div class="go_back"><?php print l('&lt; ' . t('all News'), 'news', array('html' => true)); ?></div>
	<?php endif; ?>
</article>