<?php get_header(); ?>

<?php
// enqueue styles and scripts
function ariana_projects_archive_scripts() {
  // wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/js/isotope.js' );
  wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/js/isotope.js', array( 'jquery' ), '1.0', true);
  wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.js', array( 'jquery' ), '1.0', true);
  // wp_enqueue_script( 'portfolio-js', get_template_directory_uri() . '/js/portfolio.js', array( 'isotope-js' , 'imagesloaded-js' ), '1.0', true);

  ob_start();
  $locale = get_locale();
  ?>
  (function ($) {
  <?php
  if ( 'fa_IR' == $locale ) {
    ?>
    $.Isotope.prototype._positionAbs = function( x, y ) {
      return { right: x, top: y };
    };
    <?php
  }
  ?>
    var $container = $('.portfolio'),

    colWidth = function () {
        var w = $container.width(),
            columnNum = 1,
            columnWidth = 10;
        if (w > 1200) {
            columnNum  = 4;
        }
        else if (w > 900) {
            columnNum  = 4;
        }
        else if (w > 600) {
            columnNum  = 2;
        }
        else if (w > 300) {
            columnNum  = 1;
        }
        columnWidth = Math.floor(w/columnNum);
        $container.find('.pitem').each(function() {
            var $item = $(this),
                multiplier_w = $item.attr('class').match(/item-w(\d)/),
                multiplier_h = $item.attr('class').match(/item-h(\d)/),
                width = multiplier_w ? columnWidth*multiplier_w[1]-0 : columnWidth-5,
                height = multiplier_h ? columnWidth*multiplier_h[1]*1-5 : columnWidth*0.5-5;
            $item.css({
                width: width,
                height: height
            });
        });
        return columnWidth;
    }

    function refreshWaypoints() {
        setTimeout(function() {
        }, 3000);
    }

    $('nav.portfolio-filter ul a').on('click', function() {
        var selector = $(this).attr('data-filter');
        $container.isotope({ filter: selector }, refreshWaypoints());
        $('nav.portfolio-filter ul a').removeClass('active');
        $(this).addClass('active');
        return false;
    });

    function setPortfolio() {
        setColumns();
        $container.isotope('reLayout');
    }

    $container.imagesLoaded( function() {
      $container.isotope();
    });

    isotope = function () {
        $container.isotope({
            resizable: true,
            itemSelector: '.pitem',
            layoutMode : 'masonry',
            transformsEnabled: <?php echo ( 'fa_IR' == $locale ? 'false' : 'true' ); ?>,
            gutter: 10,
            masonry: {
                columnWidth: colWidth(),
                gutterWidth: 0
            }
        });
    };

    isotope();

    $(window).smartresize(isotope);
  }(jQuery));

  <?php
  $script = ob_get_clean();
  wp_add_inline_script( 'imagesloaded-js', $script, 'after' );

}
add_action( 'wp_footer', 'ariana_projects_archive_scripts' );

// global $wp_query;
// $query = $wp_query->query;
// var_dump ($query);
// die();
//
query_posts( "post_type=ariana-projects&posts_per_page=-1" );

digicorp_page_header_section( array(
  'page_title' => __( 'OUR PROJECTS', 'digicorpdomain' ),
  'page_desc' => __( 'select a category to filter', 'digicorpdomain' ),
  'section_class' => 'visual color8'
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
                <nav class="portfolio-filter text-center">
                    <ul>
                        <li><a class="btn btn-default active" href="#" data-filter="*"><?php _e('ALL', 'digicorpdomain'); ?></a></li>
                        <?php
                        $terms = get_terms( array(
                          'taxonomy' => 'ariana-type-tags',
                        ) );

                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                          foreach ( $terms as $term ) { ?>
                              <li><a class="btn btn-default" href="#" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?> <small><?php echo $term->count; ?></small></a></li>
                              <?php
                          }
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>

       <div id="fourcol" class="portfolio">
         <?php
            while ( have_posts() ) {
              the_post();
              ?>

              <div class="pitem  item-h1 <?php echo ariana_term_list_to_css_class(); ?>">
                  <div class="entry">
                      <?php if ( has_post_thumbnail() ) { ?>
                        <img src="<?php esc_url( the_post_thumbnail_url('small') ); ?>" alt="<?php esc_html( the_title() ); ?>" class="img-responsive img-full">
                        <div class="magnifier">
                            <div class="magnibutton"><a href="<?php esc_url( the_permalink() ); ?>" target="_blank"<?php if ( get_the_post_thumbnail_caption() ) { echo ' title="' . get_the_post_thumbnail_caption() . '"'; } ?>><i class="fa fa-search"></i></a></div>
                        </div>
                      <?php } else { ?>
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/img/projects-default.png'); ?>" alt="<?php esc_html(get_the_title()); ?>" class="img-responsive">
                      <?php } ?>
                  </div>
                  <div class="portfolio-title">
                      <h4><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h4>
                      <?php echo ariana_term_list_to_string( 1 ); ?>
                  </div><!-- end title -->
              </div><!-- end col -->

              <?php
            }
         ?>
       </div>
    </div>
</section>
<?php } ?>

<?php get_footer(); ?>

<?php
function ariana_term_list_to_css_class( $max = 100, $post_id = false ) {
  if ( ! $post_id ) {
    $post = get_post();
    $post_id = ! empty( $post ) ? $post->ID : false;
    if ( ! $post_id ) { return; }
  }

  $terms = wp_get_post_terms( $post_id, 'ariana-type-tags', array("fields" => "slugs"));
  $count = count( $terms );
  $output = '';
  $counter = 0;

  foreach ( $terms as $term ) {
    if ( ++$counter <= $max ) {
      $output .=  $term;
      if ( $counter < $count && $counter < $max ) {
        $output .= ' ';
      }
    } else {
      break;
    }
  }

  return strtolower( $output );
}

function ariana_term_list_to_string( $max = 2, $post_id = false ) {
  if ( ! $post_id ) {
    $post = get_post();
    $post_id = ! empty( $post ) ? $post->ID : false;
    if ( ! $post_id ) { return; }
  }

  if ( has_term( '', 'ariana-type-tags', $post_id ) ) {

    $terms = wp_get_post_terms( $post_id, 'ariana-type-tags', array("fields" => "names"));
    $count = count( $terms );
    $output = '';
    $counter = 0;

    foreach ( $terms as $term ) {
      if ( ++$counter <= $max ) {
        $output .= $term;
        if ( $counter < $count && $counter < $max ) {
          $output .= ', ';
        }
      }
    }

  } else {
    $output = __( 'Web Services', 'digicorpdomain' );
  }

  if ( has_term( '', 'ariana-technologies', $post_id ) ) {
    $terms = wp_get_post_terms( $post_id, 'ariana-technologies', array("fields" => "names"));
    $terms = array_map( 'strtolower', $terms );
    $out_icon = '';
    switch (true) {
      case ( in_array( 'wp', $terms ) ):
      case ( in_array( 'wordpress', $terms ) ):
        $out_icon = '<i class="fa fa-wordpress"></i>';
        break;
      case ( in_array( 'html', $terms ) ):
      case ( in_array( 'html5', $terms ) ):
        $out_icon = '<i class="fa fa-html5"></i>';
        break;
      case ( in_array( 'css3', $terms ) ):
      case ( in_array( 'css', $terms ) ):
        $out_icon = '<i class="fa fa-css3"></i>';
        break;
      case ( in_array( 'joomla', $terms ) ):
        $out_icon = '<i class="fa fa-joomla"></i>';
        break;
      case ( in_array( 'windows', $terms ) ):
      case ( in_array( 'asp', $terms ) ):
      case ( in_array( 'asp.net', $terms ) ):
        $out_icon = '<i class="fa fa-windows"></i>';
        break;
      case ( in_array( 'drupal', $terms ) ):
        $out_icon = '<i class="fa fa-drupal"></i>';
        break;
      default:
        $out_icon = '<i class="fa fa-code"></i>';
        break;
    }
  } else {
    $out_icon = '<i class="fa fa-code"></i>';
  }

  return "<small>$output</small>\n$out_icon";
}
