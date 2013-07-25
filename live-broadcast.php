<?php 
/**
 * Plugin Name: Live Broadcast
 * Plugin URI: http://wordpress.org/plugins/live-broadcast
 * Description: Plugin for streaming live for WordPress
 * Author: Valerio Souza
 * Author URI: http://valeriosouza.com.br
 * Version: 0.1.1
 * License: GPLv2 or later
 * Text Domain: live_broad
 * Domain Path: /lang/
 */

load_plugin_textdomain( 'live_broad', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

function create_post_type_live_broadcast() {
	register_post_type( 'live_broadcast',
		array(
			'labels' => array(
				'name' => __( 'Live Broadcast','live_broad' ),
				'singular_name' => __('Live Broadcast','live_broad' ),
				'add_new' => __('New Post Live', 'live_broad'),
				'add_new_item' => __('Add New Post Live','live_broad'),
				'edit_item' => __('Edit Post Live','live_broad'),
				'new_item' => __('New Post Live','live_broad'),
				'all_items' => __('All Posts Live','live_broad'),
				'not_found' => __('Write a First Transmission.','live_broad'),
			),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'rewrite' => true,
			'supports' => array( 'title','thumbnail'),
			'has_archive' => true,
			'menu_position' => 26,
		)
	);
}
add_action( 'init', 'create_post_type_live_broadcast' );

function redirect_new_live_broadcast($location) {
	$screen = get_current_screen();
	$post_type = $screen->id;
	if ( 'live_broadcast' == $post_type ) {
		if (isset($_POST['save']) || isset($_POST['publish'])) {
			if (preg_match("/post=([0-9]*)/", $location, $match)) {
				$pl = wp_redirect(admin_url('post-new.php?post_type=live_broadcast'));
					die();
				if ($pl) {
					wp_redirect($pl);
				}
			}
		}
	} else {
		wp_redirect( $location );
	}
}
add_filter('redirect_post_location', 'redirect_new_live_broadcast');

function create_shortcode_live_broadcast( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'orderby' => '',
		'order'	  => '',
		), $atts ) );
	
	if ( $orderby == '' ) { $orderby = 'date'; }
	if ( $order == '' ) { $order = 'DESC'; }
	
	$args = array(
	              'post_type' => 'live_broadcast',
	              'status' 	  => 'publish',
	              'orderby'   => $orderby,
	              'order'	  => $order
	              );
	$loop = new WP_Query( $args );

	$loop_live = '<div class="live-broadcast"><ul>';
		while ( $loop->have_posts() ) : $loop->the_post();
			$loop_live .= sprintf( '<li>%s</li>', get_the_title() );
		endwhile;
	$loop_live .= '</ul></div>';
	
	return $loop_live;
}
add_shortcode('live_broadcast', 'create_shortcode_live_broadcast');