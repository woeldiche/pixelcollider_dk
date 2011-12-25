<footer<?php print $attributes; ?>>
  <?php if ($site_slogan): ?>
  <?php $class = $site_slogan_hidden ? ' element-invisible' : ''; ?>
  <p class="site-slogan"><?php print $site_slogan; ?></p>
  <?php endif; ?>
  <?php print theme('links__menu_sidebar_links', array('links' => menu_navigation_links('menu-sidebar-links'), 'attributes' => array('id' => 'sidebar-links', 'class' => array('menu', 'inline', 'clearfix', 'sidebar-links', 
  'icons')), 'heading' => array('text' => t('Secondary menu'),'level' => 'h2','class' => array('element-invisible'))));  ?>
  <?php print $content; ?>
</footer>