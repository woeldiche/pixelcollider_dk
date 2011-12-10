<article<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  
  <?php if (!$page && $title): ?>
  <header>
    <?php print render($title_prefix); ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
    <?php print render($title_suffix); ?>
  </header>
  <?php endif; ?>
  
  <?php if ($display_submitted): ?>
  <footer class="submitted"><?php print $date; ?> -- <?php print $name; ?>
  <?php endif; ?>  
  
  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
  ?>
  <footer class="meta text-secondary">
  <?php
    print render($content['field_tasks']);
    print render($content['field_status']);
    print render($content['field_link']); 
  ?>
  </footer>
  
  <?php
    print render($content);
  ?>
</article>