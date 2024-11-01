<?php 

	if ( ! defined('ABSPATH')) exit;  // if direct access 	

	function testimonial_review_metaboxes_register(){
		add_meta_box(
			'testimonial_reviews_post_message', 					# Metabox
			__( 'Testimonial Information', 'testimonial-review' ),  # Title
			'testimonial_review_inner_metaboxes', 					# $callback
			'testimonial-review', 									# $page
			'normal',												# $context
			'high'
		);
		add_meta_box(
			'ppoint_review_scode_post_message', 						# Metabox
			__( 'Testimonial Review Settings', 'testimonial-review' ),  # Title
			'testi_review_scode_inner_custom_boxes', 					# $callback
			'testimonialshortcode', 									# $page
			'normal'
		);

		add_meta_box(
			'ppoint_review_scode_display_message', 						# Metabox
			__( 'Testimonial Shortcode', 'testimonial-review' ),  		# Title
			'testi_review_scode_display_boxes', 						# $callback
			'testimonialshortcode', 									# $page
			'side'
		);
		add_meta_box(
			'ppoint_review_scode_display_review', 						# Metabox
			__( 'Need Support', 'testimonial-review' ),  				# Title
			'testi_review_scode_display_review', 						# $callback
			'testimonialshortcode', 									# $page
			'side'
		);
	}
	add_action('add_meta_boxes', 'testimonial_review_metaboxes_register');

	function testimonial_review_inner_metaboxes( $post, $args ) {
		$review_client_name			= get_post_meta($post->ID, 'review_client_name', true);
		$review_company_designation	= get_post_meta($post->ID, 'review_company_designation', true);
		$review_company_name		= get_post_meta($post->ID, 'review_company_name', true);
		$review_web_urls			= get_post_meta($post->ID, 'review_web_urls', true);
		$review_ratings				= get_post_meta($post->ID, 'review_ratings', true);

		?>
		<div class="wrap">
			<div class="testimonial-customize-area">
				<div class="testimonial-customize-inner">
					<div class="testimonial-heading-area">
						<span class="sub-heading"><?php _e('Name', 'testimonial-review');?></span>
						<span class="sub-description"><?php _e('Type name here.', 'testimonial-review');?> </span>
					</div>
					<div class="testimonial-select-items">
						<input type="text" name="review_client_name" id="review_client_name" class="timezone_string" value="<?php echo $review_client_name; ?>" placeholder="Name" required />
					</div>
				</div><!-- End Full Name -->

				<div class="testimonial-customize-inner">
					<div class="testimonial-heading-area">
						<span class="sub-heading"><?php _e('Designation', 'testimonial-review');?></span>
						<span class="sub-description"><?php _e('Type designation here.', 'testimonial-review');?> </span>
					</div>
					<div class="testimonial-select-items">
						<input type="text" name="review_company_designation" id="review_company_designation" class="timezone_string" value="<?php echo $review_company_designation; ?>" placeholder="Designation"/>
					</div>
				</div><!-- End Designation -->

				<div class="testimonial-customize-inner">
					<div class="testimonial-heading-area">
						<span class="sub-heading"><?php _e('Company Name', 'testimonial-review');?></span>
						<span class="sub-description"><?php _e('Type company name here.', 'testimonial-review');?> </span>
					</div>
					<div class="testimonial-select-items">
						<input type="text" name="review_company_name" id="review_company_name" class="timezone_string" value="<?php echo $review_company_name; ?>" placeholder="Company Name"/>
					</div>
				</div><!-- End Company Name -->

				<div class="testimonial-customize-inner">
					<div class="testimonial-heading-area">
						<span class="sub-heading"><?php _e('Website URL', 'testimonial-review');?></span>
						<span class="sub-description"><?php _e('Type website URL here. with http or https.', 'testimonial-review');?> </span>
					</div>
					<div class="testimonial-select-items">
						<input type="url" name="review_web_urls" id="review_web_urls" maxlength="200" class="timezone_string" value="<?php echo $review_web_urls; ?>" placeholder="Company URL"/>
					</div>
				</div><!-- End Company URL -->

				<div class="testimonial-customize-inner">
					<div class="testimonial-heading-area">
						<span class="sub-heading"><?php _e('Star Ratings', 'testimonial-review');?></span>
						<span class="sub-description"><?php _e('Choose your ratings. ', 'testimonial-review');?></span>
					</div>
					<div class="testimonial-select-items">
						<select name="review_ratings" id="review_ratings" class="timezone_string">
							<option value="5" <?php if ( isset ( $review_ratings ) ) selected( $review_ratings, '5' ); ?>><?php _e('5 star', 'testimonial-review');?></option>
							<option value="4" <?php if ( isset ( $review_ratings ) ) selected( $review_ratings, '4' ); ?>><?php _e('4 star', 'testimonial-review');?></option>
							<option value="3" <?php if ( isset ( $review_ratings ) ) selected( $review_ratings, '3' ); ?>><?php _e('3 star', 'testimonial-review');?></option>
							<option value="2" <?php if ( isset ( $review_ratings ) ) selected( $review_ratings, '2' ); ?>><?php _e('2 star', 'testimonial-review');?></option>
							<option value="1" <?php if ( isset ( $review_ratings ) ) selected( $review_ratings, '1' ); ?>><?php _e('1 star', 'testimonial-review');?></option>
						</select>
					</div>
				</div><!-- End Order Type -->
			</div>
		</div>
	<?php
	}

	function testimonial_review_meta_boxes_save($post_id){

		# Doing autosave then return.
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

		#Checks for input and saves if needed
		if(isset($_POST['review_client_name'])) {
			update_post_meta($post_id, 'review_client_name', $_POST['review_client_name']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['review_company_designation'])) {
			update_post_meta($post_id, 'review_company_designation', $_POST['review_company_designation']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['review_company_name'])) {
			update_post_meta($post_id, 'review_company_name', $_POST['review_company_name']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['review_web_urls'])) {
			update_post_meta($post_id, 'review_web_urls', $_POST['review_web_urls']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['review_ratings'])) {
			update_post_meta($post_id, 'review_ratings', $_POST['review_ratings']);
		}
	}

	add_action('save_post', 'testimonial_review_meta_boxes_save');


	# Testimonial Review Shortcode Page MetaBox Options
	function testi_review_scode_inner_custom_boxes( $post, $args ) {

		$review_testimonial_cats 		= get_post_meta($post->ID, 'review_testimonial_cats', true);
		if(empty($review_testimonial_cats)){
			$review_testimonial_cats = array();
		}
		$review_testimonial_navs               = get_post_meta($post->ID, 'review_testimonial_navs', true);
		$review_testimonial_themes             = get_post_meta($post->ID, 'review_testimonial_themes', true);
		$reviews_total_items                   = get_post_meta($post->ID, 'reviews_total_items', true);
		$review_testimonial_grid_type          = get_post_meta($post->ID, 'review_testimonial_grid_type', true);
		$review_testimonial_grid_style         = get_post_meta($post->ID, 'review_testimonial_grid_style', true);
		$review_testimonial_columns            = get_post_meta($post->ID, 'review_testimonial_columns', true);
		$review_testimonial_type               = get_post_meta($post->ID, 'review_testimonial_type', true);
		$review_testimonial_orderby            = get_post_meta($post->ID, 'review_testimonial_orderby', true);
		$review_testimonial_order              = get_post_meta($post->ID, 'review_testimonial_order', true);
		$review_title_hide                     = get_post_meta($post->ID, 'review_title_hide', true);
		$review_title_font_size                = get_post_meta($post->ID, 'review_title_font_size', true);
		$review_title_color                    = get_post_meta($post->ID, 'review_title_color', true);
		$review_title_transform                = get_post_meta($post->ID, 'review_title_transform', true);
		$review_thumb_styles                   = get_post_meta($post->ID, 'review_thumb_styles', true);
		$review_title_fontstyle                = get_post_meta($post->ID, 'review_title_fontstyle', true);
		$review_name_font_size                 = get_post_meta($post->ID, 'review_name_font_size', true);
		$review_name_color                     = get_post_meta($post->ID, 'review_name_color', true);
		$review_name_transform                 = get_post_meta($post->ID, 'review_name_transform', true);
		$review_name_fontstyle                 = get_post_meta($post->ID, 'review_name_fontstyle', true);
		$review_designation_color              = get_post_meta($post->ID, 'review_designation_color', true);
		$review_designation_hide               = get_post_meta($post->ID, 'review_designation_hide', true);
		$review_designation_font_size          = get_post_meta($post->ID, 'review_designation_font_size', true);
		$review_designation_transform          = get_post_meta($post->ID, 'review_designation_transform', true);
		$review_designation_fontstyle          = get_post_meta($post->ID, 'review_designation_fontstyle', true);
		$review_company_url_color              = get_post_meta($post->ID, 'review_company_url_color', true);
		$review_company_url_size               = get_post_meta($post->ID, 'review_company_url_size', true);
		$review_ratingicons_hide               = get_post_meta($post->ID, 'review_ratingicons_hide', true);
		$review_ratings_icon_color             = get_post_meta($post->ID, 'review_ratings_icon_color', true);
		$review_ratings_icon_size              = get_post_meta($post->ID, 'review_ratings_icon_size', true);
		$review_items_bgcolors                 = get_post_meta($post->ID, 'review_items_bgcolors', true);
		$review_items_text_color               = get_post_meta($post->ID, 'review_items_text_color', true);
		$review_items_text_size                = get_post_meta($post->ID, 'review_items_text_size', true);
		$review_filter_menu_position           = get_post_meta($post->ID, 'review_filter_menu_position', true );
		$review_filter_menu_style              = get_post_meta($post->ID, 'review_filter_menu_style', true );
		$review_filter_menu_color              = get_post_meta($post->ID, 'review_filter_menu_color', true );
		$review_filter_menu_bgcolor            = get_post_meta($post->ID, 'review_filter_menu_bgcolor', true );
		$review_filter_menu_hovercolor         = get_post_meta($post->ID, 'review_filter_menu_hovercolor', true );
		$review_filter_menubg_hovercolor       = get_post_meta($post->ID, 'review_filter_menubg_hovercolor', true );
		$testimonialreview_autoplay            = get_post_meta($post->ID, 'testimonialreview_autoplay', true);
		$testimonialreview_autoplay_speed      = get_post_meta($post->ID, 'testimonialreview_autoplay_speed', true);
		$testimonialreview_autohide            = get_post_meta($post->ID, 'testimonialreview_autohide', true);
		$testimonialreview_centermode          = get_post_meta($post->ID, 'testimonialreview_centermode', true);
		$testimonialreview_stophover           = get_post_meta($post->ID, 'testimonialreview_stophover', true);
		$testimonialreview_autoplaytimeout     = get_post_meta($post->ID, 'testimonialreview_autoplaytimeout', true);
		$testimonialreview_items               = get_post_meta($post->ID, 'testimonialreview_items', true);
		$testimonialreview_itemsdesktop        = get_post_meta($post->ID, 'testimonialreview_itemsdesktop', true);
		$testimonialreview_itemsdesktopsmall   = get_post_meta($post->ID, 'testimonialreview_itemsdesktopsmall', true);
		$testimonialreview_itemsmobile         = get_post_meta($post->ID, 'testimonialreview_itemsmobile', true);
		$testimonialreview_loop                = get_post_meta($post->ID, 'testimonialreview_loop', true);
		$testimonialreview_margin              = get_post_meta($post->ID, 'testimonialreview_margin', true);
		$testimonialreview_navigation          = get_post_meta($post->ID, 'testimonialreview_navigation', true);
		$testimonialreview_navigation_position = get_post_meta($post->ID, 'testimonialreview_navigation_position', true);
		$testimonialreview_navtextcolors       = get_post_meta($post->ID, 'testimonialreview_navtextcolors', true);	
		$testimonialreview_navtextcolors_hover = get_post_meta($post->ID, 'testimonialreview_navtextcolors_hover', true);	
		$testimonialreview_navbgcolors         = get_post_meta($post->ID, 'testimonialreview_navbgcolors', true);
		$testimonialreview_navbghovercolors    = get_post_meta($post->ID, 'testimonialreview_navbghovercolors', true);
		$testimonialreview_paginations         = get_post_meta($post->ID, 'testimonialreview_paginations', true);
		$testimonialreview_paginationsposition = get_post_meta($post->ID, 'testimonialreview_paginationsposition', true);
		$testimonialreview_paginations_color   = get_post_meta($post->ID, 'testimonialreview_paginations_color', true);
		$testimonialreview_paginations_bgcolor = get_post_meta($post->ID, 'testimonialreview_paginations_bgcolor', true);
		$testimonialreview_paginations_style   = get_post_meta($post->ID, 'testimonialreview_paginations_style', true);

		?>

		<div class="testimonial-review-settings post-grid-metabox">
			<!-- <div class="wrap"> -->
			<ul class="tab-nav">
				<li nav="1" class="nav1 <?php if($review_testimonial_navs == 1){echo "active";}?>"><?php _e('Testimonial Query','testimonial-review'); ?></li>
				<li nav="2" class="nav2 <?php if($review_testimonial_navs == 2){echo "active";}?>"><?php _e('General Settings ','testimonial-review'); ?></li>
				<li nav="3" class="nav3 <?php if($review_testimonial_navs == 3){echo "active";}?>"><?php _e('Grid & Slider Settings ','testimonial-review'); ?></li>
			</ul> <!-- tab-nav end -->
			<?php
				$getNavValue = "";
				if(!empty($review_testimonial_navs)){ $getNavValue = $review_testimonial_navs; } else { $getNavValue = 1; }
			?>
			<input type="hidden" name="review_testimonial_navs" id="review_testimonial_navs" value="<?php echo $getNavValue; ?>">

			<ul class="box">
				<!-- Tab 2  -->
				<li style="<?php if($review_testimonial_navs == 1){echo "display: block;";} else{ echo "display: none;"; }?>" class="box1 tab-box <?php if($review_testimonial_navs == 1){echo "active";}?>">
					<div class="option-box">
						<p class="option-title"><?php _e('Query Testimonial','testimonial-review'); ?></p>
						<div class="wrap">
							<div class="testimonial-customize-area">
								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Choose Categories', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select your Categories to display testimonials, if you did not select any Categories it shows all the testimonials.', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<ul>
											<?php
												$args = array(
													'taxonomy'     => 'testimonial-tax',
													'orderby'      => 'name',
													'show_count'   => 1,
													'pad_counts'   => 1,
													'hierarchical' => 1,
													'echo'         => 0
												);
												$acpluscats = get_categories( $args );
											?>
											<?php
												foreach( $acpluscats as $category ):
												    $cat_id = $category->cat_ID;
												    $checked = ( in_array($cat_id,(array)$review_testimonial_cats)? ' checked="checked"': "" );
												    echo'<li id="cat-'.$cat_id.'"><input type="checkbox" name="review_testimonial_cats[]" id="'.$cat_id.'" value="'.$cat_id.'"'.$checked.'> <label for="'.$cat_id.'">'.__( $category->cat_name, 'team-ultimate' ).'</label></li>';
												endforeach;
											?>
										</ul>
									</div>
								</div><!-- End Categories -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Testimonial Style', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose your testimonial styles.', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_testimonial_themes" id="review_testimonial_themes" class="timezone_string">
											<option value="1" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '1' ); ?>><?php _e('Style 01 ( Free )', 'testimonial-review');?></option>
											<option value="2" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '2' ); ?>><?php _e('Style 02 ( Free )', 'testimonial-review');?></option>
											<option value="3" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '3' ); ?>><?php _e('Style 03 ( Free )', 'testimonial-review');?></option>
											<option value="16" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '16' ); ?>><?php _e('Style 04 ( Free )', 'testimonial-review');?></option>
											<option value="17" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '17' ); ?>><?php _e('Style 05 ( Free )', 'testimonial-review');?></option>
											<option value="18" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '18' ); ?>><?php _e('Style 06 ( Free )', 'testimonial-review');?></option>
											<option value="19" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '19' ); ?>><?php _e('Style 07 ( Free )', 'testimonial-review');?></option>
											<option disabled value="4" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '4' ); ?>><?php _e('Style 4 (Only Pro)', 'testimonial-review');?></option>
											<option disabled value="5" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '5' ); ?>><?php _e('Style 5 (Only Pro)', 'testimonial-review');?></option>
											<option disabled value="6" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '6' ); ?>><?php _e('Style 6 (Only Pro)', 'testimonial-review');?></option>
											<option disabled value="7" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '7' ); ?>><?php _e('Style 7 (Only Pro)', 'testimonial-review');?></option>
											<option disabled value="8" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '8' ); ?>><?php _e('Style 8 (Only Pro)', 'testimonial-review');?></option>
											<option disabled value="9" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '9' ); ?>><?php _e('Style 9 (Only Pro)', 'testimonial-review');?></option>
											<option disabled value="10" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '10' ); ?>><?php _e('Style 10 (Only Pro)', 'testimonial-review');?></option>
											<option disabled value="11" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '11' ); ?>><?php _e('Style 11 (Only Pro)', 'testimonial-review');?></option>
											<option disabled value="12" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '12' ); ?>><?php _e('Style 12 (Only Pro)', 'testimonial-review');?></option>
											<option disabled value="13" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '13' ); ?>><?php _e('Style 13 (Only Pro)', 'testimonial-review');?></option>
											<option disabled value="14" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '14' ); ?>><?php _e('Style 14 (Only Pro)', 'testimonial-review');?></option>
											<option disabled value="15" <?php if ( isset ( $review_testimonial_themes ) ) selected( $review_testimonial_themes, '15' ); ?>><?php _e('Style 15 (Only Pro)', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Themes -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Testimonial Layout', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose Testimonial layout grid or slider. all options available on the grid & slider settings tab.', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_testimonial_type" id="review_testimonial_type" class="timezone_string">
											<option value="1" <?php if ( isset ( $review_testimonial_type ) ) selected( $review_testimonial_type, '1' ); ?>><?php _e('Grid', 'testimonial-review');?></option>
											<option value="2" <?php if ( isset ( $review_testimonial_type ) ) selected( $review_testimonial_type, '2' ); ?>><?php _e('Slider', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Type -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Order By', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial order By: Date, Menu Order or Random.', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_testimonial_orderby" id="review_testimonial_orderby" class="timezone_string">
											<option value="date" <?php if ( isset ( $review_testimonial_orderby ) ) selected( $review_testimonial_orderby, 'date' ); ?>><?php _e('Publish Date', 'testimonial-review');?></option>
											<option value="menu_order" <?php if ( isset ( $review_testimonial_orderby ) ) selected( $review_testimonial_orderby, 'menu_order' ); ?>><?php _e('Order', 'testimonial-review');?></option>
											<option value="rand" <?php if ( isset ( $review_testimonial_orderby ) ) selected( $review_testimonial_orderby, 'rand' ); ?>><?php _e('Random', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Order By -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Order', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial order: Descending or Ascending', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_testimonial_order" id="review_testimonial_order" class="timezone_string">
											<option value="DESC" <?php if ( isset ( $review_testimonial_order ) ) selected( $review_testimonial_order, 'DESC' ); ?>><?php _e('Descending', 'testimonial-review');?></option>
											<option value="ASC" <?php if ( isset ( $review_testimonial_order ) ) selected( $review_testimonial_order, 'ASC' ); ?>><?php _e('Ascending', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Order -->
							</div>
						</div>
					</div>
				</li>
				<!-- Tab 2  -->
				<li style="<?php if($review_testimonial_navs == 2){echo "display: block;";} else{ echo "display: none;"; }?>" class="box2 tab-box <?php if($review_testimonial_navs == 2){echo "active";}?>">

					<div class="option-box">
						<p class="option-title"><?php _e('General Settings','testimonial-review'); ?></p>
						<div class="wrap">
							<div class="testimonial-customize-area">
								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Testimonial Title', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Show/Hide Testimonial Title. Select hide to disable testimonial title.', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_title_hide" id="review_title_hide" class="timezone_string">
											<option value="1" <?php if ( isset ( $review_title_hide ) ) selected( $review_title_hide, '1' ); ?>><?php _e('Show', 'testimonial-review');?></option>
											<option value="2" <?php if ( isset ( $review_title_hide ) ) selected( $review_title_hide, '2' ); ?>><?php _e('Hide', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Title Text Transform -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Title Font Size', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial title font size. default font size:18px ', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="number" name="review_title_font_size" id="review_title_font_size" maxlength="4" class="timezone_string" value="<?php  if($review_title_font_size !=''){echo $review_title_font_size; }else{ echo '18';} ?>">
									</div>
								</div><!-- End Testimonial Title Font Size -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Title Font Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial title Text color. default color: #333333', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="review_title_color" id="review_title_color" class="timezone_string" value="<?php  if($review_title_color !=''){echo $review_title_color; }else{ echo '#333333';} ?>">
									</div>
								</div><!-- End Testimonial Title Text Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Title Text Transform', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial title Text Transform. default text transform: capitalize', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_title_transform" id="review_title_transform" class="timezone_string">
											<option value="unset" <?php if ( isset ( $review_title_transform ) ) selected( $review_title_transform, 'unset' ); ?>><?php _e('Default', 'testimonial-review');?></option>
											<option value="capitalize" <?php if ( isset ( $review_title_transform ) ) selected( $review_title_transform, 'capitalize' ); ?>><?php _e('Capitilize', 'testimonial-review');?></option>
											<option value="lowercase" <?php if ( isset ( $review_title_transform ) ) selected( $review_title_transform, 'lowercase' ); ?>><?php _e('Lowercase', 'testimonial-review');?></option>
											<option value="uppercase" <?php if ( isset ( $review_title_transform ) ) selected( $review_title_transform, 'uppercase' ); ?>><?php _e('Uppercase', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Title Text Transform -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Title Font Style', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial title font Style. default: Normal', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_title_fontstyle" id="review_title_fontstyle" class="timezone_string">
											<option value="normal" <?php if ( isset ( $review_title_fontstyle ) ) selected( $review_title_fontstyle, 'normal' ); ?>><?php _e('Normal', 'testimonial-review');?></option>
											<option value="italic" <?php if ( isset ( $review_title_fontstyle ) ) selected( $review_title_fontstyle, 'italic' ); ?>><?php _e('Italic', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Title Text Style -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Image Style', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose Testimonial Image Style Round or Square Size. default: Round.', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_thumb_styles" id="review_thumb_styles" class="timezone_string">
											<option value="1" <?php if ( isset ( $review_thumb_styles ) ) selected( $review_thumb_styles, '1' ); ?>><?php _e('Round', 'testimonial-review');?></option>
											<option disabled value="2" <?php if ( isset ( $review_thumb_styles ) ) selected( $review_thumb_styles, '2' ); ?>><?php _e('Square (Only Pro)', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Image Style -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Name Font Size', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Name Font Size. default font size: 15px', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="number" name="review_name_font_size" id="review_name_font_size" maxlength="4" class="timezone_string" value="<?php if($review_name_font_size !=''){echo $review_name_font_size; }else{ echo '15';} ?>">
									</div>
								</div><!-- End Testimonial Name Text Size -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Name Font Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Name Font Color. default font color: #333333', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="review_name_color" id="review_name_color" class="timezone_string" value="<?php  if($review_name_color !=''){echo $review_name_color; }else{ echo '#333333';} ?>">
									</div>
								</div><!-- End Testimonial Name Text Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Name Text Transform', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Name Text Transform. default text transform: capitalize', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_name_transform" id="review_name_transform" class="timezone_string">
											<option value="unset" <?php if ( isset ( $review_name_transform ) ) selected( $review_name_transform, 'unset' ); ?>><?php _e('Default', 'testimonial-review');?></option>
											<option value="capitalize" <?php if ( isset ( $review_name_transform ) ) selected( $review_name_transform, 'capitalize' ); ?>><?php _e('Capitilize', 'testimonial-review');?></option>
											<option value="lowercase" <?php if ( isset ( $review_name_transform ) ) selected( $review_name_transform, 'lowercase' ); ?>><?php _e('Lowercase', 'testimonial-review');?></option>
											<option value="uppercase" <?php if ( isset ( $review_name_transform ) ) selected( $review_name_transform, 'uppercase' ); ?>><?php _e('Uppercase', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Name Text Transform -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Name Text Style', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Name Text Style. default text style: Normal', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_name_fontstyle" id="review_name_fontstyle" class="timezone_string">
											<option value="normal" <?php if ( isset ( $review_name_fontstyle ) ) selected( $review_name_fontstyle, 'normal' ); ?>><?php _e('Normal', 'testimonial-review');?></option>
											<option value="italic" <?php if ( isset ( $review_name_fontstyle ) ) selected( $review_name_fontstyle, 'italic' ); ?>><?php _e('Italic', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Name Font Style -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Testimonial Designation', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Show/Hide Testimonial Designation. Select Hide to disable testimonial Designation.', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_designation_hide" id="review_designation_hide" class="timezone_string">
											<option value="1" <?php if ( isset ( $review_designation_hide ) ) selected( $review_designation_hide, '1' ); ?>><?php _e('Show', 'testimonial-review');?></option>
											<option disabled value="2" <?php if ( isset ( $review_designation_hide ) ) selected( $review_designation_hide, '2' ); ?>><?php _e('Hide (Only Pro)', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Designation Hide -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Designation Font Size', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Designation Font Size. default font size: 13px', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="number" name="review_designation_font_size" id="review_designation_font_size" maxlength="4" class="timezone_string" value="<?php if($review_designation_font_size !=''){echo $review_designation_font_size; }else{ echo '13';} ?>">
									</div>
								</div><!-- End Testimonial Designation Text Size -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Designation Font Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Designation Font Color. default font color: #333333', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="review_designation_color" id="review_designation_color" class="timezone_string" value="<?php  if($review_designation_color !=''){echo $review_designation_color; }else{ echo '#333333';} ?>">
									</div>
								</div><!-- End Testimonial Designation Text Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Designation Text Transform', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Designation Text Transform. default text transform: capitalize', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_designation_transform" id="review_designation_transform" class="timezone_string">
											<option value="unset" <?php if ( isset ( $review_designation_transform ) ) selected( $review_designation_transform, 'unset' ); ?>><?php _e('Default', 'testimonial-review');?></option>
											<option value="capitalize" <?php if ( isset ( $review_designation_transform ) ) selected( $review_designation_transform, 'capitalize' ); ?>><?php _e('Capitilize', 'testimonial-review');?></option>
											<option value="lowercase" <?php if ( isset ( $review_designation_transform ) ) selected( $review_designation_transform, 'lowercase' ); ?>><?php _e('Lowercase', 'testimonial-review');?></option>
											<option value="uppercase" <?php if ( isset ( $review_designation_transform ) ) selected( $review_designation_transform, 'uppercase' ); ?>><?php _e('Uppercase', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Designation Text Transform -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Designation Text Style', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Designation Text Style. default text style: Normal', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_designation_fontstyle" id="review_designation_fontstyle" class="timezone_string">
											<option value="normal" <?php if ( isset ( $review_designation_fontstyle ) ) selected( $review_designation_fontstyle, 'normal' ); ?>><?php _e('Normal', 'testimonial-review');?></option>
											<option value="italic" <?php if ( isset ( $review_designation_fontstyle ) ) selected( $review_designation_fontstyle, 'italic' ); ?>><?php _e('Italic', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Designation Font Style -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Company URL Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial company URL color. Default color: #333333', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="review_company_url_color" id="review_company_url_color" class="timezone_string" value="<?php  if($review_company_url_color !=''){echo $review_company_url_color; }else{ echo '#333333';} ?>">
									</div>
								</div><!-- End Testimonial URL Font Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Company URL Font Size', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial company URL font size. default font size:13px', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="number" name="review_company_url_size" id="review_company_url_size" maxlength="4" class="timezone_string" value="<?php if($review_company_url_size !=''){echo $review_company_url_size; }else{ echo '13';} ?>">
									</div>
								</div><!-- End Testimonial URL Font Size -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Testimonial Rating Icons', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Show/Hide Testimonial Rating icons. select Hide to disable testimonial rating icons.', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_ratingicons_hide" id="review_ratingicons_hide" class="timezone_string">
											<option value="1" <?php if ( isset ( $review_ratingicons_hide ) ) selected( $review_ratingicons_hide, '1' ); ?>><?php _e('Show', 'testimonial-review');?></option>
											<option disabled value="2" <?php if ( isset ( $review_ratingicons_hide ) ) selected( $review_ratingicons_hide, '2' ); ?>><?php _e('Hide (Only Pro)', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Hide Rating icons -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Rating Icon Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial rating icon color. default icon color: #ffb300', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="review_ratings_icon_color" id="review_ratings_icon_color" class="timezone_string" value="<?php  if($review_ratings_icon_color !=''){echo $review_ratings_icon_color; }else{ echo '#ffb300';} ?>">
									</div>
								</div><!-- End Testimonial Rating Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Rating Icon Size', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial rating icon font size. default font size: 15px', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="number" name="review_ratings_icon_size" id="review_ratings_icon_size" maxlength="4" class="timezone_string" value="<?php if($review_ratings_icon_size !=''){echo $review_ratings_icon_size; }else{ echo '15';} ?>">
									</div>
								</div><!-- End Testimonial Rating Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Items Background Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial item background color. default color: #f4f4f4', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="review_items_bgcolors" id="review_items_bgcolors" class="timezone_string" value="<?php  if($review_items_bgcolors !=''){echo $review_items_bgcolors; }else{ echo '#f4f4f4';} ?>">
									</div>
								</div><!-- End Testimonial Item Background Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Content Text Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial content text color. default text color: #000', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="review_items_text_color" id="review_items_text_color" class="timezone_string" value="<?php  if($review_items_text_color !=''){echo $review_items_text_color; }else{ echo '#000000';} ?>">
									</div>
								</div><!-- End Testimonial Content Text Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Content Text Size', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial content font size. default font size: 14px', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="number" name="review_items_text_size" id="review_items_text_size" maxlength="4" class="timezone_string" value="<?php if($review_items_text_size !=''){echo $review_items_text_size; }else{ echo '14';} ?>">
									</div>
								</div><!-- End Testimonial Content Text Color -->
							</div>
						</div>
					</div>
				</li>

				<!-- Tab 4  -->
				<li style="<?php if($review_testimonial_navs == 3){echo "display: block;";} else{ echo "display: none;"; }?>" class="box3 tab-box <?php if($review_testimonial_navs == 3){echo "active";}?>">

					<div class="option-box" id="test01">
						<p class="option-title">Grid Settings <span class="prohints"><a target="_blank" href="https://pickelements.com/testimonial-review">(Upgrade Pro to unlock all features)</a></span></p>

						<div class="wrap">
							<div class="testimonial-customize-area">
								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Grid Type', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select testimonial grid type default or filterable. default: Default Grid', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_testimonial_grid_type" id="review_testimonial_grid_type" class="timezone_string">
											<option value="1" <?php if ( isset ( $review_testimonial_grid_type ) ) selected( $review_testimonial_grid_type, '1' ); ?>><?php _e('Default Grid', 'testimonial-review');?></option>
											<option disabled value="2" <?php if ( isset ( $review_testimonial_grid_type ) ) selected( $review_testimonial_grid_type, '2' ); ?>><?php _e('Filterable Grid (Only Pro)', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Grid Select Column -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Grid Style', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select testimonial grid style Normal or Masonry. default: Normal Grid', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_testimonial_grid_style" id="review_testimonial_grid_style" class="timezone_string">
											<option value="1" <?php if ( isset ( $review_testimonial_grid_style ) ) selected( $review_testimonial_grid_style, '1' ); ?>><?php _e('Default Grid', 'testimonial-review');?></option>
											<option disabled value="2" <?php if ( isset ( $review_testimonial_grid_style ) ) selected( $review_testimonial_grid_style, '2' ); ?>><?php _e('Masonry Grid (Only Pro)', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Grid Select Column -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Select Grid Column', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select Testimonial grid columns. default column: 3', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_testimonial_columns" id="review_testimonial_columns" class="timezone_string">
											<option value="3" <?php if ( isset ( $review_testimonial_columns ) ) selected( $review_testimonial_columns, '3' ); ?>><?php _e('Column 3', 'testimonial-review');?></option>
											<option value="2" <?php if ( isset ( $review_testimonial_columns ) ) selected( $review_testimonial_columns, '2' ); ?>><?php _e('Column 2', 'testimonial-review');?></option>
											<option value="4" <?php if ( isset ( $review_testimonial_columns ) ) selected( $review_testimonial_columns, '4' ); ?>><?php _e('Column 4', 'testimonial-review');?></option>
											<option value="5" <?php if ( isset ( $review_testimonial_columns ) ) selected( $review_testimonial_columns, '5' ); ?>><?php _e('Column 5', 'testimonial-review');?></option>
											<option value="6" <?php if ( isset ( $review_testimonial_columns ) ) selected( $review_testimonial_columns, '6' ); ?>><?php _e('Column 6', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Grid Select Column -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Total Items Display', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select Testimonial Total items you want to display. default: 12. if you do not want to show Pagination use (-1) ', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="number" name="reviews_total_items" id="reviews_total_items" maxlength="4" class="timezone_string" value="<?php  if($reviews_total_items !=''){echo $reviews_total_items; }else{ echo '12';} ?>">
									</div>
								</div><!-- End Testimonial Grid Total Items Display -->


								<div class="hide-filter-style" id="type1" style="<?php if($review_testimonial_grid_type == 1){	echo "display:none;"; }?>">
									
								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Filter Menu Position', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select Testimonial Filter Menu Position. default Position: Center', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_filter_menu_position" id="review_filter_menu_position" class="timezone_string">
											<option value="center" <?php if ( isset ( $review_filter_menu_position ) ) selected( $review_filter_menu_position, 'center' ); ?>><?php _e('Center', 'logoshowcasepro');?></option>
											<option value="left" <?php if ( isset ( $review_filter_menu_position ) ) selected( $review_filter_menu_position, 'left' ); ?>><?php _e('Left', 'logoshowcasepro');?></option>
											<option value="right" <?php if ( isset ( $review_filter_menu_position ) ) selected( $review_filter_menu_position, 'right' ); ?>><?php _e('Right', 'logoshowcasepro');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Grid Filter Menu Position -->
									
								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Filter Menu Style', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select Testimonial Filter Menu Style. default Style: Menu default', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="review_filter_menu_style" id="review_filter_menu_style" class="timezone_string">
											<option value="1" <?php if ( isset ( $review_filter_menu_style ) ) selected( $review_filter_menu_style, '1' ); ?>><?php _e('Menu default', 'logoshowcasepro');?></option>
											<option value="2" <?php if ( isset ( $review_filter_menu_style ) ) selected( $review_filter_menu_style, '2' ); ?>><?php _e('Menu Style 1', 'logoshowcasepro');?></option>
											<option value="3" <?php if ( isset ( $review_filter_menu_style ) ) selected( $review_filter_menu_style, '3' ); ?>><?php _e('Menu Style 2', 'logoshowcasepro');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Grid Filter Menu Style -->
									
								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Menu Text Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose Testimonial Filter Menu Text Color. default Color: #000', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="review_filter_menu_color" id="review_filter_menu_color" class="timezone_string" value="<?php  if($review_filter_menu_color !=''){echo $review_filter_menu_color; }else{ echo '#000';} ?>">
									</div>
								</div><!-- End Testimonial Grid Menu Text Color -->
									
								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Menu Background Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose Testimonial Filter Menu Background Color. default Color: #f8f8f8', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="review_filter_menu_bgcolor" id="review_filter_menu_bgcolor" class="timezone_string" value="<?php  if($review_filter_menu_bgcolor !=''){echo $review_filter_menu_bgcolor; }else{ echo '#f8f8f8';} ?>">
									</div>
								</div><!-- End Testimonial Grid Menu Hover Bg Color -->
									
								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Menu Hover Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose Testimonial Filter Menu Hover Color. default Color: #fff', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="review_filter_menu_hovercolor" id="review_filter_menu_hovercolor" class="timezone_string" value="<?php  if($review_filter_menu_hovercolor !=''){echo $review_filter_menu_hovercolor; }else{ echo '#fff';} ?>">
									</div>
								</div><!-- End Testimonial Grid Menu Hover Bg Color -->
									
								<div class="testimonial-customize-inner extra-border">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Menu Hover Bg Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose Testimonial filter menu hover Background color. default Color: #11b8ea', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="review_filter_menubg_hovercolor" id="review_filter_menubg_hovercolor" class="timezone_string" value="<?php  if($review_filter_menubg_hovercolor !=''){echo $review_filter_menubg_hovercolor; }else{ echo '#11b8ea';} ?>">
									</div>
								</div><!-- End Testimonial Grid Menu Hover Bg Color -->

								</div>
							</div>
						</div>
					</div>

					<!-- Start Tab Two -->
					<div class="option-box" id="test02">
						<p class="option-title">Slider Settings <span class="prohints"><a target="_blank" href="https://pickelements.com/testimonial-review">(Available Only Pro Version)</a></span></p>

						<div class="wrap">
							<div class="testimonial-customize-area">
								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Autoplay', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select Testimonial Autoplay options. default Autoplay: Enable', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_autoplay" id="testimonialreview_autoplay" class="timezone_string">
											<option value="true" <?php if ( isset ( $testimonialreview_autoplay ) ) selected( $testimonialreview_autoplay, 'true' ); ?>><?php _e('True', 'testimonial-review');?></option>
											<option value="false" <?php if ( isset ( $testimonialreview_autoplay ) ) selected( $testimonialreview_autoplay, 'false' ); ?>><?php _e('False', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Autoplay -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Auto Hide Mode', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select Testimonial Auto Hide Mode. default Mode: Enable', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_autohide" id="testimonialreview_autohide" class="timezone_string">
											<option value="true" <?php if ( isset ( $testimonialreview_autohide ) ) selected( $testimonialreview_autohide, 'true' ); ?>><?php _e('True', 'cppostslider');?></option>
											<option value="false" <?php if ( isset ( $testimonialreview_autohide ) ) selected( $testimonialreview_autohide, 'false' ); ?>><?php _e('False', 'cppostslider');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Auto Hide Mode -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Centered Mode', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select Testimonial Centered Mode. default Mode: Disable', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_centermode" id="testimonialreview_centermode" class="timezone_string">
											<option value="false" <?php if ( isset ( $testimonialreview_centermode ) ) selected( $testimonialreview_centermode, 'false' ); ?>><?php _e('False', 'cppostslider');?></option>
											<option value="true" <?php if ( isset ( $testimonialreview_centermode ) ) selected( $testimonialreview_centermode, 'true' ); ?>><?php _e('True', 'cppostslider');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Centered Mode -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Slide Delay', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial slide delay speed. input only number(700,800,1200 etc)', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="testimonialreview_autoplay_speed" id="testimonialreview_autoplay_speed" maxlength="4" class="timezone_string" required value="<?php  if($testimonialreview_autoplay_speed !=''){echo $testimonialreview_autoplay_speed; }else{ echo '1500';} ?>">
									</div>
								</div><!-- End Testimonial Slider Slide Delay -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Stop Hover', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select Testimonial Stop Hover Mode. default Mode: Enable', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_stophover" id="testimonialreview_stophover" class="timezone_string">
											<option value="true" <?php if ( isset ( $testimonialreview_stophover ) ) selected( $testimonialreview_stophover, 'true' ); ?>><?php _e('True', 'testimonial-review');?></option>	
											<option value="false" <?php if ( isset ( $testimonialreview_stophover ) ) selected( $testimonialreview_stophover, 'false' ); ?>><?php _e('False', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Stop Hover -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Autoplay Time Out (Sec)', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Autoplay time out (Sec). default:(1000sec)', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_autoplaytimeout" id="testimonialreview_autoplaytimeout" class="timezone_string">
											<option value="1000" <?php if ( isset ( $testimonialreview_autoplaytimeout ) ) selected( $testimonialreview_autoplaytimeout, '1000' ); ?>><?php _e('1', 'testimonial-review');?></option>
											<option value="2000" <?php if ( isset ( $testimonialreview_autoplaytimeout ) ) selected( $testimonialreview_autoplaytimeout, '2000' ); ?>><?php _e('2 ', 'testimonial-review');?></option>
											<option value="3000" <?php if ( isset ( $testimonialreview_autoplaytimeout ) ) selected( $testimonialreview_autoplaytimeout, '3000' ); ?>><?php _e('3 ', 'testimonial-review');?></option>
											<option value="4000" <?php if ( isset ( $testimonialreview_autoplaytimeout ) ) selected( $testimonialreview_autoplaytimeout, '4000' ); ?>><?php _e('4 ', 'testimonial-review');?></option>
											<option value="5000" <?php if ( isset ( $testimonialreview_autoplaytimeout ) ) selected( $testimonialreview_autoplaytimeout, '5000' ); ?>><?php _e('5 ', 'testimonial-review');?></option>
											<option value="6000" <?php if ( isset ( $testimonialreview_autoplaytimeout ) ) selected( $testimonialreview_autoplaytimeout, '6000' ); ?>><?php _e('6 ', 'testimonial-review');?></option>
											<option value="7000" <?php if ( isset ( $testimonialreview_autoplaytimeout ) ) selected( $testimonialreview_autoplaytimeout, '7000' ); ?>><?php _e('7 ', 'testimonial-review');?></option>
											<option value="8000" <?php if ( isset ( $testimonialreview_autoplaytimeout ) ) selected( $testimonialreview_autoplaytimeout, '8000' ); ?>><?php _e('8 ', 'testimonial-review');?></option>
											<option value="9000" <?php if ( isset ( $testimonialreview_autoplaytimeout ) ) selected( $testimonialreview_autoplaytimeout, '9000' ); ?>><?php _e('9 ', 'testimonial-review');?></option>
											<option value="10000" <?php if ( isset ( $testimonialreview_autoplaytimeout ) ) selected( $testimonialreview_autoplaytimeout, '10000' ); ?>><?php _e('10', 'testimonial-review');?></option>
										</select>	
									</div>
								</div><!-- End Testimonial Slider Autoplay Time Out (Sec) -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Items No', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial total item display per slide. default: 3 items', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_items" id="testimonialreview_items" class="timezone_string">
											<option value="3" <?php if ( isset ( $testimonialreview_items ) )  selected( $testimonialreview_items, '3' ); ?>><?php _e('3', 'testimonial-review');?></option>
											<option value="1" <?php if ( isset ( $testimonialreview_items ) )  selected( $testimonialreview_items, '1' ); ?>><?php _e('1', 'testimonial-review');?></option>
											<option value="2" <?php if ( isset ( $testimonialreview_items ) )  selected( $testimonialreview_items, '2' ); ?>><?php _e('2', 'testimonial-review');?></option>
											<option value="4" <?php if ( isset ( $testimonialreview_items ) )  selected( $testimonialreview_items, '4' ); ?>><?php _e('4', 'testimonial-review');?></option>
											<option value="5" <?php if ( isset ( $testimonialreview_items ) )  selected( $testimonialreview_items, '5' ); ?>><?php _e('5 ', 'testimonial-review');?></option>
											<option value="6" <?php if ( isset ( $testimonialreview_items ) )  selected( $testimonialreview_items, '6' ); ?>><?php _e('6 ', 'testimonial-review');?></option>
											<option value="7" <?php if ( isset ( $testimonialreview_items ) )  selected( $testimonialreview_items, '7' ); ?>><?php _e('7 ', 'testimonial-review');?></option>
											<option value="8" <?php if ( isset ( $testimonialreview_items ) )  selected( $testimonialreview_items, '8' ); ?>><?php _e('8 ', 'testimonial-review');?></option>
											<option value="9" <?php if ( isset ( $testimonialreview_items ) )  selected( $testimonialreview_items, '9' ); ?>><?php _e('9 ', 'testimonial-review');?></option>
											<option value="10" <?php if ( isset ( $testimonialreview_items ) ) selected( $testimonialreview_items, '10' ); ?>><?php _e('10 ', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Items No -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Items Desktop', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial total items display on desktop. default:3 ', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_itemsdesktop" id="testimonialreview_itemsdesktop" class="timezone_string">
											<option value="3" <?php if ( isset ( $testimonialreview_itemsdesktop ) ) selected( $testimonialreview_itemsdesktop, '3' ); ?>><?php _e('3', 'testimonial-review');?></option>
											<option value="1" <?php if ( isset ( $testimonialreview_itemsdesktop ) ) selected( $testimonialreview_itemsdesktop, '1' ); ?>><?php _e('1', 'testimonial-review');?></option>
											<option value="2" <?php if ( isset ( $testimonialreview_itemsdesktop ) ) selected( $testimonialreview_itemsdesktop, '2' ); ?>><?php _e('2', 'testimonial-review');?></option>
											<option value="4" <?php if ( isset ( $testimonialreview_itemsdesktop ) ) selected( $testimonialreview_itemsdesktop, '4' ); ?>><?php _e('4', 'testimonial-review');?></option>
											<option value="5" <?php if ( isset ( $testimonialreview_itemsdesktop ) ) selected( $testimonialreview_itemsdesktop, '5' ); ?>><?php _e('5', 'testimonial-review');?></option>
											<option value="6" <?php if ( isset ( $testimonialreview_itemsdesktop ) ) selected( $testimonialreview_itemsdesktop, '6' ); ?>><?php _e('6', 'testimonial-review');?></option>
											<option value="7" <?php if ( isset ( $testimonialreview_itemsdesktop ) ) selected( $testimonialreview_itemsdesktop, '7' ); ?>><?php _e('7', 'testimonial-review');?></option>
											<option value="8" <?php if ( isset ( $testimonialreview_itemsdesktop ) ) selected( $testimonialreview_itemsdesktop, '8' ); ?>><?php _e('8', 'testimonial-review');?></option>
											<option value="9" <?php if ( isset ( $testimonialreview_itemsdesktop ) ) selected( $testimonialreview_itemsdesktop, '9' ); ?>><?php _e('9', 'testimonial-review');?></option>
											<option value="10" <?php if ( isset ( $testimonialreview_itemsdesktop ) ) selected( $testimonialreview_itemsdesktop, '10' ); ?>><?php _e('10', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Items Desktop -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Items Desktop Small', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial total items display on desktop small. default:1', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_itemsdesktopsmall" id="testimonialreview_itemsdesktopsmall" class="timezone_string">
											<option value="1" <?php if ( isset ( $testimonialreview_itemsdesktopsmall ) ) selected( $testimonialreview_itemsdesktopsmall, '1' ); ?>><?php _e('1', 'testimonial-review');?></option>
											<option value="2" <?php if ( isset ( $testimonialreview_itemsdesktopsmall ) ) selected( $testimonialreview_itemsdesktopsmall, '2' ); ?>><?php _e('2', 'testimonial-review');?></option>
											<option value="3" <?php if ( isset ( $testimonialreview_itemsdesktopsmall ) ) selected( $testimonialreview_itemsdesktopsmall, '3' ); ?>><?php _e('3', 'testimonial-review');?></option>
											<option value="4" <?php if ( isset ( $testimonialreview_itemsdesktopsmall ) ) selected( $testimonialreview_itemsdesktopsmall, '4' ); ?>><?php _e('4', 'testimonial-review');?></option>
											<option value="5" <?php if ( isset ( $testimonialreview_itemsdesktopsmall ) ) selected( $testimonialreview_itemsdesktopsmall, '5' ); ?>><?php _e('5', 'testimonial-review');?></option>
											<option value="6" <?php if ( isset ( $testimonialreview_itemsdesktopsmall ) ) selected( $testimonialreview_itemsdesktopsmall, '6' ); ?>><?php _e('6', 'testimonial-review');?></option>
											<option value="7" <?php if ( isset ( $testimonialreview_itemsdesktopsmall ) ) selected( $testimonialreview_itemsdesktopsmall, '7' ); ?>><?php _e('7', 'testimonial-review');?></option>
											<option value="8" <?php if ( isset ( $testimonialreview_itemsdesktopsmall ) ) selected( $testimonialreview_itemsdesktopsmall, '8' ); ?>><?php _e('8', 'testimonial-review');?></option>
											<option value="9" <?php if ( isset ( $testimonialreview_itemsdesktopsmall ) ) selected( $testimonialreview_itemsdesktopsmall, '9' ); ?>><?php _e('9', 'testimonial-review');?></option>
											<option value="10" <?php if ( isset ( $testimonialreview_itemsdesktopsmall ) ) selected( $testimonialreview_itemsdesktopsmall, '10' ); ?>><?php _e('10', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Items Desktop Small -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Items Mobile', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial total items display on Mobile. default:1', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_itemsmobile" id="testimonialreview_itemsmobile" class="timezone_string">
											<option value="1" <?php if ( isset ( $testimonialreview_itemsmobile ) ) selected( $testimonialreview_itemsmobile, '1' ); ?>><?php _e('1', 'testimonial-review');?></option>
											<option value="2" <?php if ( isset ( $testimonialreview_itemsmobile ) ) selected( $testimonialreview_itemsmobile, '2' ); ?>><?php _e('2', 'testimonial-review');?></option>
											<option value="3" <?php if ( isset ( $testimonialreview_itemsmobile ) ) selected( $testimonialreview_itemsmobile, '3' ); ?>><?php _e('3', 'testimonial-review');?></option>
											<option value="4" <?php if ( isset ( $testimonialreview_itemsmobile ) ) selected( $testimonialreview_itemsmobile, '4' ); ?>><?php _e('4', 'testimonial-review');?></option>
											<option value="5" <?php if ( isset ( $testimonialreview_itemsmobile ) ) selected( $testimonialreview_itemsmobile, '5' ); ?>><?php _e('5', 'testimonial-review');?></option>
											<option value="6" <?php if ( isset ( $testimonialreview_itemsmobile ) ) selected( $testimonialreview_itemsmobile, '6' ); ?>><?php _e('6', 'testimonial-review');?></option>
											<option value="7" <?php if ( isset ( $testimonialreview_itemsmobile ) ) selected( $testimonialreview_itemsmobile, '7' ); ?>><?php _e('7', 'testimonial-review');?></option>
											<option value="8" <?php if ( isset ( $testimonialreview_itemsmobile ) ) selected( $testimonialreview_itemsmobile, '8' ); ?>><?php _e('8', 'testimonial-review');?></option>
											<option value="9" <?php if ( isset ( $testimonialreview_itemsmobile ) ) selected( $testimonialreview_itemsmobile, '9' ); ?>><?php _e('9', 'testimonial-review');?></option>
											<option value="10" <?php if ( isset ( $testimonialreview_itemsmobile ) ) selected( $testimonialreview_itemsmobile, '10' ); ?>><?php _e('10', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Items Mobile -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Loop', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select Testimonial items loop. default Mode: Enable', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_loop" id="testimonialreview_loop" class="timezone_string">
											<option value="true" <?php if ( isset ( $testimonialreview_loop ) ) selected( $testimonialreview_loop, 'true' ); ?>><?php _e('True', 'testimonial-review');?></option>
											<option value="false" <?php if ( isset ( $testimonialreview_loop ) ) selected( $testimonialreview_loop, 'false' ); ?>><?php _e('False', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Loop -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Margin', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial items margin size. default margin:10px ', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="number" name="testimonialreview_margin" id="testimonialreview_margin" maxlength="3" class="timezone_string" value="<?php if($testimonialreview_margin !=''){echo $testimonialreview_margin;} else{ echo '10'; } ?>" value="0">
									</div>
								</div><!-- End Testimonial Slider Margin -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Navigation', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select Testimonial Navigation Mode. default Mode: Enable', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_navigation" id="testimonialreview_navigation" class="timezone_string">
											<option value="true" <?php if ( isset ( $testimonialreview_navigation ) ) selected( $testimonialreview_navigation, 'true' ); ?>><?php _e('True', 'testimonial-review');?></option>
											<option value="false" <?php if ( isset ( $testimonialreview_navigation ) ) selected( $testimonialreview_navigation, 'false' ); ?>><?php _e('False', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Navigation -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Navigation Position', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Select Testimonial Navigation Position. default Position: Top Right', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_navigation_position" id="testimonialreview_navigation_position" class="timezone_string">
											<option value="1" <?php if ( isset ( $testimonialreview_navigation_position ) ) selected( $testimonialreview_navigation_position, '1' ); ?>><?php _e('Top Right', 'testimonial-review');?></option>
											<option value="2" <?php if ( isset ( $testimonialreview_navigation_position ) ) selected( $testimonialreview_navigation_position, '2' ); ?>><?php _e('Top Left', 'testimonial-review');?></option>
											<option value="3" <?php if ( isset ( $testimonialreview_navigation_position ) ) selected( $testimonialreview_navigation_position, '3' ); ?>><?php _e('Bottom Center', 'testimonial-review');?></option>
											<option value="4" <?php if ( isset ( $testimonialreview_navigation_position ) ) selected( $testimonialreview_navigation_position, '4' ); ?>><?php _e('Bottom Left', 'testimonial-review');?></option>
											<option value="5" <?php if ( isset ( $testimonialreview_navigation_position ) ) selected( $testimonialreview_navigation_position, '5' ); ?>><?php _e('Bottom Right', 'testimonial-review');?></option>
											<option value="6" <?php if ( isset ( $testimonialreview_navigation_position ) ) selected( $testimonialreview_navigation_position, '6' ); ?>><?php _e('Centred', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Navigation Position -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Navigation Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Navigation text color. default color:#A28352 ', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="testimonialreview_navtextcolors" id="testimonialreview_navtextcolors" class="timezone_string" value="<?php  if($testimonialreview_navtextcolors !=''){echo $testimonialreview_navtextcolors; }else{ echo '#A28352';} ?>">
									</div>
								</div><!-- End Testimonial Slider Navigation Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Navigation Hover Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Navigation Hover Color. default color:#A28352 ', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="testimonialreview_navtextcolors_hover" id="testimonialreview_navtextcolors_hover" class="timezone_string" value="<?php  if($testimonialreview_navtextcolors_hover !=''){echo $testimonialreview_navtextcolors_hover; }else{ echo '#A28352';} ?>">
									</div>
								</div><!-- End Testimonial Slider Navigation Hover Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Navigation Background Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Navigation Background Color. default color:#DBEAF7 ', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="testimonialreview_navbgcolors" id="testimonialreview_navbgcolors" class="timezone_string" value="<?php  if($testimonialreview_navbgcolors !=''){echo $testimonialreview_navbgcolors; }else{ echo '#DBEAF7';} ?>">
									</div>
								</div><!-- End Testimonial Slider Navigation Background Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Navigation Hover Background Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Navigation Hover Background Color. default color:#DBEAF7', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="testimonialreview_navbghovercolors" id="testimonialreview_navbghovercolors" class="timezone_string" value="<?php  if($testimonialreview_navbghovercolors !=''){echo $testimonialreview_navbghovercolors; }else{ echo '#DBEAF7';} ?>">
									</div>
								</div><!-- End Testimonial Slider Navigation Hover Background Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Pagination', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Enable or Disable. default Mode: Enable ', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_paginations" id="testimonialreview_paginations" class="timezone_string">
											<option value="true" <?php if ( isset ( $testimonialreview_paginations ) ) selected( $testimonialreview_paginations, 'true' ); ?>><?php _e('True', 'testimonial-review');?></option>
											<option value="false" <?php if ( isset ( $testimonialreview_paginations ) ) selected( $testimonialreview_paginations, 'false' ); ?>><?php _e('False', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Pagination -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Pagination Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Pagination Color. default color:#f001f0 ', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="testimonialreview_paginations_color" id="testimonialreview_paginations_color" class="timezone_string" value="<?php  if($testimonialreview_paginations_color !=''){echo $testimonialreview_paginations_color; }else{ echo '#f001f0';} ?>">
									</div>
								</div><!-- End Testimonial Slider Pagination Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Pagination Background Color', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Pagination Background Color. default color:#7A4B94 ', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<input type="text" name="testimonialreview_paginations_bgcolor" id="testimonialreview_paginations_bgcolor" class="timezone_string" value="<?php  if($testimonialreview_paginations_bgcolor !=''){echo $testimonialreview_paginations_bgcolor; }else{ echo '#7A4B94';} ?>">
									</div>
								</div><!-- End Testimonial Slider Pagination Background Color -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Pagination Style', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial Pagination style. default style: Round ', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_paginations_style" id="testimonialreview_paginations_style" class="timezone_string">
											<option value="1" <?php if ( isset ( $testimonialreview_paginations_style ) ) selected( $testimonialreview_paginations_style, '1' ); ?>><?php _e('Round', 'testimonial-review');?></option>
											<option value="2" <?php if ( isset ( $testimonialreview_paginations_style ) ) selected( $testimonialreview_paginations_style, '2' ); ?>><?php _e('Square', 'testimonial-review');?></option>
											<option value="3" <?php if ( isset ( $testimonialreview_paginations_style ) ) selected( $testimonialreview_paginations_style, '3' ); ?>><?php _e('Star', 'testimonial-review');?></option>
											<option value="4" <?php if ( isset ( $testimonialreview_paginations_style ) ) selected( $testimonialreview_paginations_style, '4' ); ?>><?php _e('Line', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Pagination Style -->

								<div class="testimonial-customize-inner">
									<div class="testimonial-heading-area">
										<span class="sub-heading"><?php _e('Pagination Position', 'testimonial-review');?></span>
										<span class="sub-description"><?php _e('Choose testimonial title font size. default font size:16px ', 'testimonial-review');?> </span>
									</div>
									<div class="testimonial-select-items">
										<select name="testimonialreview_paginationsposition" id="testimonialreview_paginationsposition" class="timezone_string">
											<option value="center" <?php if ( isset ( $testimonialreview_paginationsposition ) ) selected( $testimonialreview_paginationsposition, 'center' ); ?>><?php _e('Center', 'testimonial-review');?></option>
											<option value="left" <?php if ( isset ( $testimonialreview_paginationsposition ) ) selected( $testimonialreview_paginationsposition, 'left' ); ?>><?php _e('Left', 'testimonial-review');?></option>
											<option value="right" <?php if ( isset ( $testimonialreview_paginationsposition ) ) selected( $testimonialreview_paginationsposition, 'right' ); ?>><?php _e('Right', 'testimonial-review');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Pagination Position -->
							</div>
						</div>
					</div> <!-- end tab 2 -->

				</li>
			</ul>
		</div>

		<script>
			jQuery(document).ready(function(){
				jQuery("#company_website_input, #review_title_color, #review_pagination_activecolor, #review_pagination_bgactive, #review_pagination_fontcolor, #review_pagination_bg_color, #review_items_bgcolors, #review_items_text_color, #review_name_color, #review_designation_color, #review_ratings_icon_color, #review_company_url_color, #review_filter_menu_color, #review_filter_menu_bgcolor, #review_filter_menu_hovercolor, #review_filter_menubg_hovercolor, #testimonialreview_paginations_bgcolor, #testimonialreview_paginations_color, #testimonialreview_navbghovercolors, #testimonialreview_navbgcolors, #testimonialreview_navtextcolors_hover, #testimonialreview_navtextcolors").wpColorPicker();
			});
		</script>
	<?php
	}

	# Accordion Plus Shortcode page MetaBox Options Save
	function testimonial_review_scode_meta_boxes_save($post_id){

		# Doing autosave then return.
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

		#Checks for input and saves if needed
		if( isset( $_POST['review_testimonial_cats'] ) ) {
			update_post_meta( $post_id, 'review_testimonial_cats', $_POST[ 'review_testimonial_cats' ]  );
		} else {
            update_post_meta( $post_id, 'review_testimonial_cats', 'unchecked' );
        }

		#Checks for input and saves if needed
		if( isset( $_POST['review_testimonial_themes'] ) ) {
			update_post_meta( $post_id, 'review_testimonial_themes', $_POST[ 'review_testimonial_themes' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['reviews_total_items'] ) ) {
			update_post_meta( $post_id, 'reviews_total_items', $_POST[ 'reviews_total_items' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_testimonial_grid_style'] ) ) {
			update_post_meta( $post_id, 'review_testimonial_grid_style', $_POST[ 'review_testimonial_grid_style' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_testimonial_grid_type'] ) ) {
			update_post_meta( $post_id, 'review_testimonial_grid_type', $_POST[ 'review_testimonial_grid_type' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_testimonial_columns'] ) ) {
			update_post_meta( $post_id, 'review_testimonial_columns', $_POST[ 'review_testimonial_columns' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_testimonial_type'] ) ) {
			update_post_meta( $post_id, 'review_testimonial_type', $_POST[ 'review_testimonial_type' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_testimonial_orderby'] ) ) {
			update_post_meta( $post_id, 'review_testimonial_orderby', $_POST[ 'review_testimonial_orderby' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_testimonial_order'] ) ) {
			update_post_meta( $post_id, 'review_testimonial_order', $_POST[ 'review_testimonial_order' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_title_hide'] ) ) {
			update_post_meta( $post_id, 'review_title_hide', $_POST[ 'review_title_hide' ]  );
		}
		
		#Checks for input and saves if needed
		if( isset( $_POST['review_title_font_size'] ) ) {
			update_post_meta( $post_id, 'review_title_font_size', $_POST[ 'review_title_font_size' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_title_color'] ) ) {
			update_post_meta( $post_id, 'review_title_color', $_POST[ 'review_title_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['ppoint_title_alignment'] ) ) {
			update_post_meta( $post_id, 'ppoint_title_alignment', $_POST[ 'ppoint_title_alignment' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_title_transform'] ) ) {
			update_post_meta( $post_id, 'review_title_transform', $_POST[ 'review_title_transform' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_thumb_styles'] ) ) {
			update_post_meta( $post_id, 'review_thumb_styles', $_POST[ 'review_thumb_styles' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_title_fontstyle'] ) ) {
			update_post_meta( $post_id, 'review_title_fontstyle', $_POST[ 'review_title_fontstyle' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_name_font_size'] ) ) {
			update_post_meta( $post_id, 'review_name_font_size', $_POST[ 'review_name_font_size' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_name_color'] ) ) {
			update_post_meta( $post_id, 'review_name_color', $_POST[ 'review_name_color' ]  );
		}
		
		#Checks for input and saves if needed
		if( isset( $_POST['review_name_transform'] ) ) {
			update_post_meta( $post_id, 'review_name_transform', $_POST[ 'review_name_transform' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_name_fontstyle'] ) ) {
			update_post_meta( $post_id, 'review_name_fontstyle', $_POST[ 'review_name_fontstyle' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_designation_color'] ) ) {
			update_post_meta( $post_id, 'review_designation_color', $_POST[ 'review_designation_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_designation_hide'] ) ) {
			update_post_meta( $post_id, 'review_designation_hide', $_POST[ 'review_designation_hide' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_designation_font_size'] ) ) {
			update_post_meta( $post_id, 'review_designation_font_size', $_POST[ 'review_designation_font_size' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_designation_transform'] ) ) {
			update_post_meta( $post_id, 'review_designation_transform', $_POST[ 'review_designation_transform' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_designation_fontstyle'] ) ) {
			update_post_meta( $post_id, 'review_designation_fontstyle', $_POST[ 'review_designation_fontstyle' ]  );
		}

		#Value check and saves if needed
		if( isset( $_POST[ 'review_testimonial_navs' ] ) ) {
			update_post_meta( $post_id, 'review_testimonial_navs', $_POST['review_testimonial_navs'] );
		} else {
			update_post_meta( $post_id, 'review_testimonial_navs', 1 );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_pagination_style'] ) ) {
			update_post_meta( $post_id, 'review_pagination_style', $_POST[ 'review_pagination_style' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_pagination_align'] ) ) {
			update_post_meta( $post_id, 'review_pagination_align', $_POST[ 'review_pagination_align' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_pagination_bg_color'] ) ) {
			update_post_meta( $post_id, 'review_pagination_bg_color', $_POST[ 'review_pagination_bg_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_pagination_fontcolor'] ) ) {
			update_post_meta( $post_id, 'review_pagination_fontcolor', $_POST[ 'review_pagination_fontcolor' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_pagination_bgactive'] ) ) {
			update_post_meta( $post_id, 'review_pagination_bgactive', $_POST[ 'review_pagination_bgactive' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_pagination_activecolor'] ) ) {
			update_post_meta( $post_id, 'review_pagination_activecolor', $_POST[ 'review_pagination_activecolor' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_company_url_size'] ) ) {
			update_post_meta( $post_id, 'review_company_url_size', $_POST[ 'review_company_url_size' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_company_url_color'] ) ) {
			update_post_meta( $post_id, 'review_company_url_color', $_POST[ 'review_company_url_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_ratingicons_hide'] ) ) {
			update_post_meta( $post_id, 'review_ratingicons_hide', $_POST[ 'review_ratingicons_hide' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_ratings_icon_color'] ) ) {
			update_post_meta( $post_id, 'review_ratings_icon_color', $_POST[ 'review_ratings_icon_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_ratings_icon_size'] ) ) {
			update_post_meta( $post_id, 'review_ratings_icon_size', $_POST[ 'review_ratings_icon_size' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_items_bgcolors'] ) ) {
			update_post_meta( $post_id, 'review_items_bgcolors', $_POST[ 'review_items_bgcolors' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_items_text_color'] ) ) {
			update_post_meta( $post_id, 'review_items_text_color', $_POST[ 'review_items_text_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['review_items_text_size'] ) ) {
			update_post_meta( $post_id, 'review_items_text_size', $_POST[ 'review_items_text_size' ]  );
		}

		#Value check and saves if needed
		if( isset( $_POST[ 'review_pagination_goback' ] ) ) {
			if($_POST[ 'review_pagination_goback' ] == "" || $_POST[ 'review_pagination_goback' ] == null || $_POST[ 'review_pagination_goback' ] == '0' || strlen($_POST['review_pagination_goback']) >= 15 || is_numeric($_POST[ 'review_pagination_goback' ])){
				update_post_meta( $post_id, 'review_pagination_goback', 'Previous' );
			}
			else{
				update_post_meta( $post_id, 'review_pagination_goback', esc_html($_POST['review_pagination_goback']) );
			}
		}

		#Value check and saves if needed
		if( isset( $_POST[ 'review_pagination_goforward' ] ) ) {
			if($_POST[ 'review_pagination_goforward' ] == "" || $_POST[ 'review_pagination_goforward' ] == null || $_POST[ 'review_pagination_goforward' ] == '0' || strlen($_POST['review_pagination_goforward']) >= 15 || is_numeric($_POST[ 'review_pagination_goforward' ])){
				update_post_meta( $post_id, 'review_pagination_goforward', 'Next' );
			}
			else{
				update_post_meta( $post_id, 'review_pagination_goforward', esc_html($_POST['review_pagination_goforward']) );
			}		
		}

		#Checks for input and saves if needed
		if(isset($_POST['review_filter_menu_position'])) {
			update_post_meta($post_id, 'review_filter_menu_position', $_POST['review_filter_menu_position']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['review_filter_menu_style'])) {
			update_post_meta($post_id, 'review_filter_menu_style', $_POST['review_filter_menu_style']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['review_filter_menu_color'])) {
			update_post_meta($post_id, 'review_filter_menu_color', $_POST['review_filter_menu_color']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['review_filter_menu_bgcolor'])) {
			update_post_meta($post_id, 'review_filter_menu_bgcolor', $_POST['review_filter_menu_bgcolor']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['review_filter_menu_hovercolor'])) {
			update_post_meta($post_id, 'review_filter_menu_hovercolor', $_POST['review_filter_menu_hovercolor']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['review_filter_menubg_hovercolor'])) {
			update_post_meta($post_id, 'review_filter_menubg_hovercolor', $_POST['review_filter_menubg_hovercolor']);
		}

	    // Carousal Settings

		#Checks for input and sanitizes/saves if needed
	    if( isset($_POST['testimonialreview_items']) && ($_POST['testimonialreview_items'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_items', esc_html($_POST['testimonialreview_items']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_loop']) && ($_POST['testimonialreview_loop'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_loop', esc_html($_POST['testimonialreview_loop']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset( $_POST['testimonialreview_margin'] ) ) {
	    	if(strlen($_POST['testimonialreview_margin']) > 2){     // input value length greate than 2 

	    	} else{
		    	if( $_POST['testimonialreview_margin'] == '' || $_POST['testimonialreview_margin'] == is_null($_POST['testimonialreview_margin']) ){

		    		update_post_meta( $post_id, 'testimonialreview_margin', 0 );

		    	}else{
		    		if (is_numeric($_POST['testimonialreview_margin'])) {

		    			update_post_meta( $post_id, 'testimonialreview_margin', esc_html($_POST['testimonialreview_margin']) );

		    		}
		    	}
	    	}
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_navigation']) && ($_POST['testimonialreview_navigation'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_navigation', esc_html($_POST['testimonialreview_navigation']) );
	    }
		
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_navigation_position']) && ($_POST['testimonialreview_navigation_position'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_navigation_position', esc_html($_POST['testimonialreview_navigation_position']) );
	    }
		
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_paginationsposition']) && ($_POST['testimonialreview_paginationsposition'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_paginationsposition', esc_html($_POST['testimonialreview_paginationsposition']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_paginations']) && ($_POST['testimonialreview_paginations'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_paginations', esc_html($_POST['testimonialreview_paginations']) );
	    }  

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_paginations_color']) && ($_POST['testimonialreview_paginations_color'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_paginations_color', esc_html($_POST['testimonialreview_paginations_color']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_paginations_bgcolor']) && ($_POST['testimonialreview_paginations_bgcolor'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_paginations_bgcolor', esc_html($_POST['testimonialreview_paginations_bgcolor']) );
	    } 

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_paginations_style']) && ($_POST['testimonialreview_paginations_style'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_paginations_style', esc_html($_POST['testimonialreview_paginations_style']) );
	    }    
	    
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_autoplay']) && ($_POST['testimonialreview_autoplay'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_autoplay', esc_html($_POST['testimonialreview_autoplay']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset( $_POST['testimonialreview_autoplay_speed'] ) ) {
	    	if(strlen($_POST['testimonialreview_autoplay_speed']) > 4 ){

	    	} else{

	    		if($_POST['testimonialreview_autoplay_speed'] == '' || is_null($_POST['testimonialreview_autoplay_speed'])){

	    			update_post_meta( $post_id, 'testimonialreview_autoplay_speed', 1500 );
	    		}else{
		    		if (is_numeric($_POST['testimonialreview_margin']) && strlen($_POST['testimonialreview_autoplay_speed']) <= 4) {

		    			update_post_meta( $post_id, 'testimonialreview_autoplay_speed', esc_html($_POST['testimonialreview_autoplay_speed']) );

		    		}
	    		}
	    	}
	    }
		
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_autohide']) && ($_POST['testimonialreview_autohide'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_autohide', esc_html($_POST['testimonialreview_autohide']) );
	    } 
	    
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_centermode']) && ($_POST['testimonialreview_centermode'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_centermode', esc_html($_POST['testimonialreview_centermode']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_stophover']) && ($_POST['testimonialreview_stophover'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_stophover', esc_html($_POST['testimonialreview_stophover']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_itemsdesktop']) && ($_POST['testimonialreview_itemsdesktop'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_itemsdesktop', esc_html($_POST['testimonialreview_itemsdesktop']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_itemsdesktopsmall']) && ($_POST['testimonialreview_itemsdesktopsmall'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_itemsdesktopsmall', esc_html($_POST['testimonialreview_itemsdesktopsmall']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_itemsmobile']) && ($_POST['testimonialreview_itemsmobile'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_itemsmobile', esc_html($_POST['testimonialreview_itemsmobile']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_autoplaytimeout']) && ($_POST['testimonialreview_autoplaytimeout'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_autoplaytimeout', esc_html($_POST['testimonialreview_autoplaytimeout']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_navtextcolors']) && ($_POST['testimonialreview_navtextcolors'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_navtextcolors', esc_html($_POST['testimonialreview_navtextcolors']) );
	    }
		
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_navtextcolors_hover']) && ($_POST['testimonialreview_navtextcolors_hover'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_navtextcolors_hover', esc_html($_POST['testimonialreview_navtextcolors_hover']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_navbgcolors']) && ($_POST['testimonialreview_navbgcolors'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_navbgcolors', esc_html($_POST['testimonialreview_navbgcolors']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['testimonialreview_navbghovercolors']) && ($_POST['testimonialreview_navbghovercolors'] != '') ) {
	        update_post_meta( $post_id, 'testimonialreview_navbghovercolors', esc_html($_POST['testimonialreview_navbghovercolors']) );
	    }
	}
	add_action('save_post', 'testimonial_review_scode_meta_boxes_save');


	function testi_review_scode_display_boxes( $post, $args ) { ?>
		<p class="option-info"><?php _e('Copy and paste this shortcode into your posts or pages.','testimonial-review'); ?></p>
			<textarea cols="35" rows="1" onClick="this.select();" >[testimonialreview <?php echo 'id="'.$post->ID.'"';?>]</textarea>
		<?php
	}

	function testi_review_scode_display_review( $post, $args ) { ?>
		<div class="support-area">
			<p>If you need any help or found any bugs in our plugin please do not hesitate to post it on the plugin support page. we are happy to solve our plugin issues.  </p>
			<div class="testimonial-review-review">
				<a target="_blank" class="testimonial-btn" href="https://pickelements.com/contact">Support</a>
			</div>
		</div>
		<?php
	}