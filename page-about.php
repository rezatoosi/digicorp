<?php
get_header();

digicorp_page_header_section( array(
  'section_class' => 'visual bg-grd-2'
  // 'section_class' => 'visual section-hero'

));
?>

<?php get_template_part( 'template-parts/sections/about', 'brands' ); ?>

<?php get_template_part( 'template-parts/sections/about', 'history' ); ?>

<?php get_template_part( 'template-parts/sections/about', 'philosophy' ); ?>

<?php get_template_part( 'template-parts/sections/frontpage', 'features' ); ?>

<?php get_footer(); ?>
