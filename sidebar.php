<?php
  // echo $sidebar;
?>

<?php
  if ( is_active_sidebar('right-sidebar-1') ) :
    dynamic_sidebar('right-sidebar-1');
  endif;
?>

<?php
  if ( is_active_sidebar('right-sidebar-bottom') ) :
    dynamic_sidebar('right-sidebar-bottom');
  endif;
?>
