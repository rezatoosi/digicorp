<?php
  // echo $sidebar;
?>

<?php
  if ( is_active_sidebar('right-sidebar-1') ) :
    dynamic_sidebar('right-sidebar-1');
  endif;
?>

<?php digicorp_related_posts_sidebar() ?>

<?php
  if ( is_active_sidebar('right-sidebar-bottom') ) :
    dynamic_sidebar('right-sidebar-bottom');
  endif;
?>
