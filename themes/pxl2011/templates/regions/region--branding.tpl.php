<div<?php print $attributes; ?>>
    <?php if ($linked_logo_img || $site_name || $site_slogan): ?>
    
      <?php if ($site_name || $site_slogan): ?>
        <?php if ($site_name): ?>
        <?php $class = $site_name_hidden ? ' element-invisible' : ''; ?>
          <?php if ($is_front): ?>        
          <h1 class="site-name<?php print $class; ?>"><?php print $linked_site_name; ?></h1>
          <?php else: ?>
          <h2 class="site-name<?php print $class; ?>"><?php print $linked_site_name; ?></h2>
          <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>

    <?php endif; ?>
    <?php print $content; ?>
</div>