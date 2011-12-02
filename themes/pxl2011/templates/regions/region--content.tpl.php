<div<?php print $attributes; ?>>
  <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
  <?php if ($breadcrumb): ?>
  <?php print $breadcrumb; ?>
  <?php endif; ?>
  <a id="main-content"></a>
  <?php if ($title): ?>
  <?php if ($title_hidden): ?><div class="element-invisible"><?php endif; ?>
  <?php print render($title_prefix); ?>
  <h1 class="title" id="page-title"><?php print $title; ?></h1>
  <?php print render($title_suffix); ?>
  <?php if ($title_hidden): ?></div><?php endif; ?>
  <?php endif; ?>
  <div<?php print $content_attributes; ?>>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
    <?php print $content; ?>
    <?php if ($feed_icons): ?><div class="feed-icon clearfix"><?php print $feed_icons; ?></div><?php endif; ?>
  </div>
</div>