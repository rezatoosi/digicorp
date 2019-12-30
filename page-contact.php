<?php
get_header();

digicorp_page_header_section( array(
  'section_class' => 'visual'
  // 'section_class' => 'visual bg-grd-2'
  // 'section_class' => 'visual section-hero'

));
?>

<?php get_template_part( 'template-parts/sections/contact', 'address' ); ?>

<?php get_template_part( 'template-parts/sections/contact', 'phone' ); ?>

<?php get_template_part( 'template-parts/sections/contact', 'social' ); ?>

<?php get_template_part( 'template-parts/sections/contact', 'form' ); ?>

<?php get_footer(); ?>
