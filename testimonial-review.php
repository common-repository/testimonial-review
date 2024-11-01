<?php
/*
	Plugin Name: Testimonial Review
	Plugin URI: https://pickelements.com/testimonial-review
	Description: Testimonial Review plugin is a simple tool to display your customer's testimonials, feedback on your WordPress website. You can use any type of feedback to make a testimonial with the author's name, photo, company logo, and a URL to the client's website.
	Version: 1.9
	Author: Pickelements
	Author URI: https://pickelements.com
	TextDomain: testimonial-review
	License: GPLv2
*/

	if ( ! defined( 'ABSPATH' ) )
	die( "Can't load this file directly" );

	define('TESTIMONIAL_REVIEW_VERSION_WP_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('testimonial_review_version_wp_plugin_dir', plugin_dir_path( __FILE__ ) );
	add_filter('widget_text', 'do_shortcode');

	# Testimonial Review enqueue scripts
	function testimonial_review_wordpress_post_script(){
		wp_register_style('testimonial-review-font', TESTIMONIAL_REVIEW_VERSION_WP_PLUGIN_PATH.'public/css/font-awesome.css');
		wp_register_style('testimonial-review-public-css', TESTIMONIAL_REVIEW_VERSION_WP_PLUGIN_PATH.'public/css/testimonial-review-public.css');
		wp_register_style('testimonial-carousel', TESTIMONIAL_REVIEW_VERSION_WP_PLUGIN_PATH.'public/css/owl.carousel.min.css');
		wp_register_style('testimonial-carousel-theme', TESTIMONIAL_REVIEW_VERSION_WP_PLUGIN_PATH.'public/css/owl.theme.default.css');
		wp_enqueue_script('jquery');
		wp_register_script('testimonial-isotope-js', plugins_url('public/js/isotope.pkgd.min.js', __FILE__), array('jquery'), '3.0.4', true);
		wp_register_script('testimonial-owl-js', plugins_url('public/js/owl.carousel.js', __FILE__), array('jquery'), '3.0.4', true);
		wp_register_script('testimonial-review-public-js', plugins_url('public/js/testimonial-review-public.js', __FILE__), array('jquery'), '1.0.0', true);
	}
	add_action('wp_enqueue_scripts', 'testimonial_review_wordpress_post_script');

	# Testimonial Review wordpress Load Translation
	function testimonial_review_load_textdomain(){
		load_plugin_textdomain('testimonial-review', false, dirname( plugin_basename( __FILE__ ) ) .'/languages/' );
	}
	add_action('plugins_loaded', 'testimonial_review_load_textdomain');

	# Testimonial Review Admin enqueue scripts
	function testimonial_review_admin_enqueue_scripts(){
		wp_enqueue_script( 'jquery' );
		global $post_type;
		if( is_admin() ) {
			if( 'testimonial-review' == $post_type || 'testimonialshortcode' == $post_type ){
				wp_enqueue_style('testimonial-review-admin-css', TESTIMONIAL_REVIEW_VERSION_WP_PLUGIN_PATH.'admin/css/testimonial-review-admin.css');
				wp_register_style('testimonial-review-font-admin', TESTIMONIAL_REVIEW_VERSION_WP_PLUGIN_PATH.'public/css/font-awesome.css');
				wp_enqueue_style('testimonial-review-font-admin');
				wp_enqueue_script('testimonial-review-admin-js', TESTIMONIAL_REVIEW_VERSION_WP_PLUGIN_PATH.'admin/js/testimonial-review-admin.js', array('jquery'), '1.0.0', true );
				wp_register_script('testimonial-rating-js-admin', plugins_url('public/js/jquery.raty-fa.js', __FILE__), array('jquery'), '0.1.1', true);
				wp_enqueue_script('testimonial-rating-js-admin');
				wp_enqueue_style('wp-color-picker');
				wp_enqueue_script( 'testimonial_review_color_picker', plugins_url('admin/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
			}
		}
	}
	add_action('admin_enqueue_scripts', 'testimonial_review_admin_enqueue_scripts');

	# Post Type
	require_once( 'libs/post-types/testimonial-review-post-type.php' );

	# Metaboxes
	require_once( 'libs/meta-boxes/testimonial-review-post-metaboxes.php' );

	# Shortcode
	require_once( 'libs/shortcode/testimonial-review-shortcode.php' );