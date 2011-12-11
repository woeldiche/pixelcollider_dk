<footer<?php print $attributes; ?>>
  <?php if ($site_slogan): ?>
  <?php $class = $site_slogan_hidden ? ' element-invisible' : ''; ?>
  <p class="site-slogan"><?php print $site_slogan; ?></p>
  <?php endif; ?>
  <?php print $content; ?>
</footer>