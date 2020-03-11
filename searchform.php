<div class="customsearchform">
  <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
      <div class="field">
        <label>
          <span class="sr-only"><?php _e( "Search for", "digicorpdomain"); ?></span>
          <input type="search" placeholder="<?php _e( "Search the site…", "digicorpdomain"); ?>" value="<?php the_search_query(); ?>" name="s" id="s" class="form-control" title="<?php _e( "Search for", "digicorpdomain"); ?>">
        </label>
        <!-- <input type="submit" id="searchsubmit" value="Search" class="btn btn-primary"/> -->
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-search"></i>
            <span class="sr-only"><?php _e( "Search", "digicorpdomain"); ?></span>
        </button>
        <?php // TODO: change button to html5 <button> tag and translate form ?>
      </div>
      <?php if ( is_search() ) {?>
        <div class="customsearchform-bottom">
          <?php
            $post_types = get_query_var( 'post_type' );

            // global $wp;
            // var_dump( $wp->query_vars );
            // die();
            // var_dump($post_types);
            // if ( ! is_array( $post_types ) || 'any' == $post_types )
            if ( is_array( $post_types ) ) {
              $post_checked = ( in_array( 'post', $post_types ) ) ? ' checked' : '';
              $services_checked = ( in_array( 'ariana-services', $post_types ) ) ? ' checked' : '';
              $projects_checked = ( in_array( 'ariana-projects', $post_types ) ) ? ' checked' : '';
            }
            else {
              global $wp;
              $query_vars = $wp->query_vars;
              $query_vars['post_type'] = array('post','ariana-services','ariana-projects');
              // var_dump( add_query_arg( $query_vars, home_url() ) );
              wp_safe_redirect( add_query_arg( $query_vars, home_url() ), $status = 302 );

              // $post_checked = ' checked';
              // $services_checked = ' checked';
              // $projects_checked = ' checked';

            }
          ?>
          <span><?php _e( 'Search in: ', 'digicorpdomain' ); ?></span>
          <label class="checkbox-inline"><input id="blog" name="post_type[]" type="checkbox" value="post"<?php echo $post_checked; ?>><?php _e( 'Blog', 'digicorpdomain' ); ?></label>
          <label class="checkbox-inline"><input id="services" name="post_type[]" type="checkbox" value="ariana-services"<?php echo $services_checked; ?>><?php _e( 'Services', 'digicorpdomain' ); ?></label>
          <label class="checkbox-inline"><input id="projects" name="post_type[]" type="checkbox" value="ariana-projects"<?php echo $projects_checked; ?>><?php _e( 'Projects', 'digicorpdomain' ); ?></label>
          <p class="search-count">
              <?php
                printf(
                  /* Translators: %s count of posts found in search result */
                  __( '%s results found.', 'digicorpdomain' ),
                  digicorp_get_search_found_posts()
                );
              ?>
          </p>
        </div>
      <?php } else { ?>
        <input type="hidden" name="post_type[]" value="post" />
        <input type="hidden" name="post_type[]" value="ariana-services" />
        <input type="hidden" name="post_type[]" value="ariana-projects" />
      <?php } ?>
  </form>
</div>
