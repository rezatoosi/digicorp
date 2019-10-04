<?php
if ( get_theme_mod( 'digicorp_sections_services_enabled' ) ):
?>
  <section class="section lb" id="section-services">
      <div class="container">
        <?php if ( ! empty( get_theme_mod( 'digicorp_sections_services_title' ) ) ): ?>
          <div class="section-title text-center">
              <h5><?php echo get_theme_mod( 'digicorp_sections_services_subtitle' ); ?></h5>
              <h3><?php echo get_theme_mod( 'digicorp_sections_services_title' ); ?></h3>
              <hr>
          </div><!-- end title -->
        <?php endif;?>

        <div class="services-carousel owl-carousel owl-theme text-center">
            <?php echo do_shortcode('[ariana_services mode=default]'); ?>
        </div>
      </div>
  </section>
  <?php
  add_action( "wp_footer", function() {
    $locale = get_locale();
  ?>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      var $ = jQuery.noConflict();
      $('.services-carousel').owlCarousel({
          loop:true,
          margin:10,
          dots:false,
          rtl: <?php echo ('fa_IR' == $locale ? 'true' : 'false'); ?>,
          responsiveClass:true,
          navText: [
             "<i class='fa fa-angle-<?php echo ('fa_IR' == $locale ? 'right' : 'left'); ?>'></i>",
             "<i class='fa fa-angle-<?php echo ('fa_IR' == $locale ? 'left' : 'right'); ?>'></i>"
          ],
          responsive:{
              0:{
                  items:1,
                  nav:false
              },
              600:{
                  items:2,
                  nav:false
              },
              1000:{
                  items:4,
                  nav:true,
                  loop:false
              }
          }
      });
    });
  </script>
<?php
});
endif;
?>
