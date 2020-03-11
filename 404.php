<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package DIGICORP
 */

get_header();
digicorp_page_header_section( array(
  'section_class' => 'visual color8',
  'page_title'    => __( 'Not Found!', 'digicorpdomain' ),
  'page_desc'     => __( 'Oops! That page can&rsquo;t be found.', 'digicorpdomain' )
));
?>
  <section class="section error-404 not-found">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title text-left pb-30">
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'digicorpdomain' ); ?></p>
                </div>

                <?php
                get_search_form();

                // the_widget( 'Ariana_Widget_Recent_Posts' );
                ?>

                <div class="widget widget_categories">
                  <h2 class="widget-title">
                    <?php // esc_html_e( 'Most Used Categories', 'digicorpdomain' ); ?>
                  </h2>
                  <ul>
                    <?php
                    // wp_list_categories( array(
                    //   'orderby'    => 'count',
                    //   'order'      => 'DESC',
                    //   'show_count' => 1,
                    //   'title_li'   => '',
                    //   'number'     => 10,
                    // ) );
                    ?>
                  </ul>
                </div><!-- .widget -->

                <div class="pt-30">
                  <?php
                  /* translators: %1$s: smiley */
                  // $digicorp_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'digicorpdomain' ), convert_smilies( ':)' ) ) . '</p>';
                  // the_widget( 'Ariana_Widget_Archives', 'dropdown=0', "after_title=</h2>$digicorp_archive_content" );

                  the_widget( 'Ariana_Widget_Tag_Cloud' );
                  ?>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div>
  </section>

<?php
get_footer();
