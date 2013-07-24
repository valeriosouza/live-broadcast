<?php 
/**
 * Plugin Name: Live Broadcast
 * Plugin URI: 
 * Description: Plugin for streaming live for WordPress
 * Author: Valerio Souza
 * Author URI: http://valeriosouza.com.br
 * Version: 0.1.0
 * License: GPLv2 or later
 * Text Domain: live_broad
 * Domain Path: /lang/
 */

load_plugin_textdomain( 'live_broad', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

require dirname( __FILE__ ) . '/loop-live-broadcast.php';

@include_once 'loop-live-broadcast.php';

add_action( 'init', 'create_post_type_live_broadcast' );

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


add_filter('redirect_post_location', 'redirect_new_live_broadcast');

function redirect_new_live_broadcast($location)
{
    if (isset($_POST['save']) || isset($_POST['publish'])) {
        if (preg_match("/post=([0-9]*)/", $location, $match)) {
            $pl = wp_redirect(admin_url('post-new.php?post_type=live_broadcast'));
				die();
            if ($pl) {
                wp_redirect($pl);
            }
        }
    }
}


function create_shortcode_live_broadcast() {
	
	$args = array(  'post_type' => 'live_broadcast');
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();

			$loop_live = print_r('<li>');
				     	 the_title();
						 print_r('</li>');
		endwhile;
            return $loop_live;
}

add_shortcode('live_broadcast', 'create_shortcode_live_broadcast');