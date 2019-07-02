<?php get_header(); ?>

<section id="page-header" class="visual">
    <div class="container">
        <div class="text-block">
            <div class="heading-holder">
                <h1><?php wp_title(''); ?></h1>
            </div>
            <p class="tagline">
              <?php
                $page_desc = '';
                $page_desc = get_post_meta(get_queried_object_id(), "post_desc", true);
                echo ($page_desc) ? $page_desc : '';
              ?>
            </p>
        </div>
    </div>
</section>

<?php // TODO: add a search form for archive ?>

<?php
// $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
else { $paged = 1; }

// $args = array_merge( $wp_query->query, array(
//   'posts_per_page' => 5,
//   'paged' => $paged
// ) );

$args = array(
  'posts_per_page' => '3',
  'paged' => $paged
);

$query = new WP_Query( $args );
// query_posts( $args );

if ( $query->have_posts() ) {
?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <?php
                while ( $query->have_posts() ) {
                  $query->the_post();
                  get_template_part('template-parts/post/blog','category');
                }

                // Pagination
                $big = 999999999;
                $pagination = array(
                  'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'format'             => '?paged=%#%',
                  'total'              => $query->max_num_pages,
                  'current'            => max( 1, get_query_var('paged') ),
                  'mid_size'           => 2,
                  'show_all'           => false,
                  'prev_next'          => true,
                  'prev_text'          => __('«'),
                  'next_text'          => __('»'),
                  'type'               => 'list',
                  'add_args'           => false,
                  'add_fragment'       => '',
                  'before_page_number' => '',
                  'after_page_number'  => ''
                );
                //more paging links
                // if ( !empty( $query->query_vars[ 's' ] ) )
                //     $pagination[ 'add_args' ] = array( 's' => get_query_var( 's' ) );
                //build the paging links
                // if ( $wp_rewrite->using_permalinks() )
                //     $pagination[ 'base' ] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );


                $links_output = paginate_links( $pagination );
                echo '<nav class="clearfix">' . str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $links_output ) . '</nav>';
                
                // the_posts_pagination( array(
                // 	'mid_size'  => 2,
                // 	'prev_text' => __( 'Back', 'textdomain' ),
                // 	'next_text' => __( 'Onward', 'textdomain' ),
                // ) );
                // next_posts_link( 'Newer posts', $query->max_num_pages );
                // wp_reset_postdata();
              ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php get_footer(); ?>
