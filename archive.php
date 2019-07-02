<?php get_header(); ?>

<?php
  digicorp_page_header_section( array(
    'page_title'  => single_term_title( '', false),
    'page_desc'   => get_the_archive_description()
  ));
?>

<?php // TODO: add a search form for archive ?>

<?php

if ( have_posts() ) {
?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <?php
                while ( have_posts() ) {
                  the_post();
                  get_template_part('template-parts/content/content','excerpt');
                }

                digicorp_the_posts_navigation();
              ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php get_footer(); ?>
