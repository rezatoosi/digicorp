<?php get_header(); ?>

<?php
  digicorp_page_header_section();
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
                  echo '<div class="col-md-4 col-sm-6">';
                  get_template_part('template-parts/content/content','excerptv3');
                  echo '</div>';
                }
              ?>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?php digicorp_the_posts_navigation(); ?>
          </div>
        </div>
    </div>
</section>
<?php } ?>

<?php get_footer(); ?>
