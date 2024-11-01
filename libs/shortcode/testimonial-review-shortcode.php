<?php

    if( !defined( 'ABSPATH' ) ){
        exit;
    }  // if direct access

	function testimonial_review_shortcode_attr( $atts, $content = null ) {
		wp_enqueue_style('testimonial-review-font');
		wp_enqueue_style('testimonial-review-public-css');
		wp_enqueue_style('testimonial-carousel');
		wp_enqueue_style('testimonial-carousel-theme');
		wp_enqueue_script('testimonial-isotope-js');
		wp_enqueue_script('testimonial-owl-js');
		wp_enqueue_script('testimonial-review-public-js');

		global $post, $paged, $query;
		$atts = shortcode_atts(
			array(
				'id' => '',
		), $atts);
		$postid = $atts['id'];
		
		$review_testimonial_cats   					= get_post_meta($postid, 'review_testimonial_cats', true);
		$review_testimonial_themes   				= get_post_meta($postid, 'review_testimonial_themes', true);
		$reviews_total_items   						= get_post_meta($postid, 'reviews_total_items', true);
		$review_testimonial_grid_type  			 	= get_post_meta($postid, 'review_testimonial_grid_type', true);
		$review_testimonial_columns   				= get_post_meta($postid, 'review_testimonial_columns', true);
		$review_testimonial_orderby   				= get_post_meta($postid, 'review_testimonial_orderby', true);
		$review_testimonial_order   				= get_post_meta($postid, 'review_testimonial_order', true);
		$review_testimonial_type   					= get_post_meta($postid, 'review_testimonial_type', true);
		$review_testimonial_grid_type   			= get_post_meta($postid, 'review_testimonial_grid_type', true);
		$review_testimonial_grid_style  			= get_post_meta($postid, 'review_testimonial_grid_style', true);
		$review_title_hide   						= get_post_meta($postid, 'review_title_hide', true);
		$review_title_color   						= get_post_meta($postid, 'review_title_color', true);
		$review_title_transform   					= get_post_meta($postid, 'review_title_transform', true);
		$review_title_font_size   					= get_post_meta($postid, 'review_title_font_size', true);
		$review_thumb_styles   						= get_post_meta($postid, 'review_thumb_styles', true);
		$review_title_fontstyle   					= get_post_meta($postid, 'review_title_fontstyle', true);
		$review_name_font_size   					= get_post_meta($postid, 'review_name_font_size', true);
		$review_name_color   						= get_post_meta($postid, 'review_name_color', true);
		$review_name_transform   					= get_post_meta($postid, 'review_name_transform', true);
		$review_name_fontstyle   					= get_post_meta($postid, 'review_name_fontstyle', true);

		// designation options settings
		$review_designation_hide   					= get_post_meta($postid, 'review_designation_hide', true);
		$review_designation_font_size   			= get_post_meta($postid, 'review_designation_font_size', true);
		$review_designation_color   				= get_post_meta($postid, 'review_designation_color', true);
		$review_designation_transform   			= get_post_meta($postid, 'review_designation_transform', true);
		$review_designation_fontstyle   			= get_post_meta($postid, 'review_designation_fontstyle', true);

		// Filter menu options
		$review_filter_menu_style           		= get_post_meta($postid, 'review_filter_menu_style', true);
		$review_filter_menu_position       			= get_post_meta($postid, 'review_filter_menu_position', true);
		$review_filter_menu_color           		= get_post_meta($postid, 'review_filter_menu_color', true);
		$review_filter_menu_bgcolor         		= get_post_meta($postid, 'review_filter_menu_bgcolor', true);
		$review_filter_menu_hovercolor      		= get_post_meta($postid, 'review_filter_menu_hovercolor', true);
		$review_filter_menubg_hovercolor   			= get_post_meta($postid, 'review_filter_menubg_hovercolor', true);

		// all pagination options
		$review_company_url_color   				= get_post_meta($postid, 'review_company_url_color', true);
		$review_company_url_size   					= get_post_meta($postid, 'review_company_url_size', true);
		$review_ratingicons_hide   					= get_post_meta($postid, 'review_ratingicons_hide', true);
		$review_ratings_icon_color   				= get_post_meta($postid, 'review_ratings_icon_color', true);
		$review_ratings_icon_size   				= get_post_meta($postid, 'review_ratings_icon_size', true);
		$review_items_bgcolors   					= get_post_meta($postid, 'review_items_bgcolors', true);
		$review_items_text_color   					= get_post_meta($postid, 'review_items_text_color', true);
		$review_items_text_size   					= get_post_meta($postid, 'review_items_text_size', true);

		 // slider options
	    $testimonialreview_items   					= get_post_meta($postid, 'testimonialreview_items', true);
	    $testimonialreview_autohide           		= get_post_meta($postid, 'testimonialreview_autohide', true);
	    $testimonialreview_centermode           	= get_post_meta($postid, 'testimonialreview_centermode', true);
	    $testimonialreview_itemsdesktop     		= get_post_meta($postid, 'testimonialreview_itemsdesktop', true);
	    $testimonialreview_itemsdesktopsmall		= get_post_meta($postid, 'testimonialreview_itemsdesktopsmall', true);
	    $testimonialreview_itemsmobile      		= get_post_meta($postid, 'testimonialreview_itemsmobile', true); 
	    $testimonialreview_loop    					= get_post_meta($postid, 'testimonialreview_loop', true);
	    $testimonialreview_margin   				= get_post_meta($postid, 'testimonialreview_margin', true);
	    $testimonialreview_autoplay         		= get_post_meta($postid, 'testimonialreview_autoplay', true);
	    $testimonialreview_autoplay_speed  	 		= get_post_meta($postid, 'testimonialreview_autoplay_speed', true);
	    $testimonialreview_autoplaytimeout  		= get_post_meta($postid, 'testimonialreview_autoplaytimeout', true);
	    $testimonialreview_navigation         		= get_post_meta($postid, 'testimonialreview_navigation', true);
	    $testimonialreview_navigation_position  	= get_post_meta($postid, 'testimonialreview_navigation_position', true);
	    $testimonialreview_paginations          	= get_post_meta($postid, 'testimonialreview_paginations', true);
	    $testimonialreview_paginationsposition   	= get_post_meta($postid, 'testimonialreview_paginationsposition', true);
	    $testimonialreview_stophover            	= get_post_meta($postid, 'testimonialreview_stophover', true);
	    $testimonialreview_navtextcolors        	= get_post_meta($postid, 'testimonialreview_navtextcolors', true);
	    $testimonialreview_navtextcolors_hover   	= get_post_meta($postid, 'testimonialreview_navtextcolors_hover', true);
	    $testimonialreview_navbgcolors        		= get_post_meta($postid, 'testimonialreview_navbgcolors', true);
	    $testimonialreview_navbghovercolors     	= get_post_meta($postid, 'testimonialreview_navbghovercolors', true);
	    $testimonialreview_paginations_color     	= get_post_meta($postid, 'testimonialreview_paginations_color', true);
	    $testimonialreview_paginations_bgcolor   	= get_post_meta($postid, 'testimonialreview_paginations_bgcolor', true);
	    $testimonialreview_paginations_style    	= get_post_meta($postid, 'testimonialreview_paginations_style', true);

		if( is_array( $review_testimonial_cats ) ){
			$review_query_cats =  array();
			$num = count($review_testimonial_cats);
			for($j=0; $j<$num; $j++){
				array_push($review_query_cats, $review_testimonial_cats[$j]);
			}

			$args = array(
				'post_type' 	 	=> 'testimonial-review',
				'post_status'	 	=> 'publish',
				'posts_per_page'	=> $reviews_total_items,
				'orderby'	   	   	=> $review_testimonial_orderby,
				'order'			 	=> $review_testimonial_order,
			    'tax_query' => [
			        'relation' => 'OR',
			        [
			            'taxonomy' => 'testimonial-tax',
			            'field' => 'id',
			            'terms' => $tmult_query_cats,
			        ],
			        // [
			        //     'taxonomy' => 'testimonial-tax',
			        //     'field' => 'id',
			        //     'operator' => 'NOT EXISTS',
			        // ],
			    ],
			);
        }else{
			$args = array(
				'post_type' => 'testimonial-review',
				'post_status' => 'publish',
				'posts_per_page' => 8,
				'orderby'	   	   	=> $review_testimonial_orderby,
				'order'			 	=> $review_testimonial_order,
			);
        }

		$review_query = new WP_Query( $args );

		ob_start();

		switch ($review_testimonial_themes) {
		    case '1':

		    	include __DIR__ . '/template/theme-1.php';

		    break;
		    case '2':

		    	include __DIR__ . '/template/theme-2.php';

		    break;
		    case '3':

		    	include __DIR__ . '/template/theme-3.php';

		    break;
		    case '16':

		    	include __DIR__ . '/template/theme-16.php';

		    break;
		    case '17':

		    	include __DIR__ . '/template/theme-17.php';

		    break;
		    case '18':

		    	include __DIR__ . '/template/theme-18.php';

		    break;
		    case '19':

		    	include __DIR__ . '/template/theme-19.php';

		    break;
		}
		return ob_get_clean();
    }
	add_shortcode( 'testimonialreview', 'testimonial_review_shortcode_attr' );