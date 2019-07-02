<?php

class Ariana_Nav_Menu_Widget extends WP_Nav_Menu_Widget {

	public function widget( $args, $instance ) {
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( ! $nav_menu ) {
			return;
		}

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$nav_menu_args = array(
			'fallback_cb' => '',
			'menu'        => $nav_menu
		);

		wp_nav_menu( array(
      'menu'            => $nav_menu,
      'container'       => '',
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'check',
      'menu_id'         => '',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'depth'           => 0
    ) );

		echo $args['after_widget'];
	}
}
