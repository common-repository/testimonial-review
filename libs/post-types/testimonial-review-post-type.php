<?php 

	if ( ! defined('ABSPATH')) exit;  // if direct access

	// Register Custom Post Type
	function testimonial_review_post_register() {
		$labels = array(
			'name'                  => _x( 'Testimonial Review', 'Post Type General Name', 'testimonial-review' ),
			'singular_name'         => _x( 'Testimonial Review', 'Post Type Singular Name', 'testimonial-review' ),
			'menu_name'             => __( 'Testimonial Review', 'testimonial-review' ),
			'name_admin_bar'        => __( 'Testimonial Review', 'testimonial-review' ),
			'archives'              => __( 'Testimonial Archives', 'testimonial-review' ),
			'attributes'            => __( 'Testimonial Attributes', 'testimonial-review' ),
			'parent_item_colon'     => __( 'Parent Testimonial:', 'testimonial-review' ),
			'all_items'             => __( 'All Testimonials', 'testimonial-review' ),
			'add_new_item'          => __( 'Add Testimonial', 'testimonial-review' ),
			'add_new'               => __( 'Add Testimonial', 'testimonial-review' ),
			'new_item'              => __( 'New Testimonial', 'testimonial-review' ),
			'edit_item'             => __( 'Edit Testimonial', 'testimonial-review' ),
			'update_item'           => __( 'Update Testimonial', 'testimonial-review' ),
			'view_item'             => __( 'View Testimonial', 'testimonial-review' ),
			'view_items'            => __( 'View Testimonials', 'testimonial-review' ),
			'search_items'          => __( 'Search Testimonial', 'testimonial-review' ),
			'not_found'             => __( 'Testimonial Not found', 'testimonial-review' ),
			'not_found_in_trash'    => __( 'Testimonial Not found in Trash', 'testimonial-review' ),
			'featured_image'        => __( 'Testimonial Featured Image', 'testimonial-review' ),
			'set_featured_image'    => __( 'Set testimonial featured image', 'testimonial-review' ),
			'remove_featured_image' => __( 'Remove testimonial featured image', 'testimonial-review' ),
			'use_featured_image'    => __( 'Use as testimonial featured image', 'testimonial-review' ),
			'insert_into_item'      => __( 'Insert into Testimonial', 'testimonial-review' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'testimonial-review' ),
			'items_list'            => __( 'Testimonials list', 'testimonial-review' ),
			'items_list_navigation' => __( 'Testimonials list navigation', 'testimonial-review' ),
			'filter_items_list'     => __( 'Filter Testimonial list', 'testimonial-review' ),
		);
		$args = array(
			'label'                 => __( 'Testimonial Review', 'testimonial-review' ),
			'description'           => __( 'Testimonial Review Post Description.', 'testimonial-review' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 25,
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'menu_icon'    => 'dashicons-admin-comments',
			'capability_type'       => 'page',
		);
		register_post_type( 'testimonial-review', $args );
	}
	add_action('init', 'testimonial_review_post_register');
	
	// Register Custom Taxonomy
	function testimonial_review_custom_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Categories', 'Taxonomy General Name', 'testimonial-review' ),
			'singular_name'              => _x( 'Categories', 'Taxonomy Singular Name', 'testimonial-review' ),
			'menu_name'                  => __( 'Categories', 'testimonial-review' ),
			'all_items'                  => __( 'All Categories', 'testimonial-review' ),
			'parent_item'                => __( 'Parent Category', 'testimonial-review' ),
			'parent_item_colon'          => __( 'Parent Category:', 'testimonial-review' ),
			'new_item_name'              => __( 'New Category Name', 'testimonial-review' ),
			'add_new_item'               => __( 'Add Category', 'testimonial-review' ),
			'edit_item'                  => __( 'Edit Category', 'testimonial-review' ),
			'update_item'                => __( 'Update Category', 'testimonial-review' ),
			'view_item'                  => __( 'View Category', 'testimonial-review' ),
			'separate_items_with_commas' => __( 'Separate groups with commas', 'testimonial-review' ),
			'add_or_remove_items'        => __( 'Add or remove Category', 'testimonial-review' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'testimonial-review' ),
			'popular_items'              => __( 'Popular Category', 'testimonial-review' ),
			'search_items'               => __( 'Search Category', 'testimonial-review' ),
			'not_found'                  => __( 'Not Category Found', 'testimonial-review' ),
			'no_terms'                   => __( 'No Category', 'testimonial-review' ),
			'items_list'                 => __( 'Category list', 'testimonial-review' ),
			'items_list_navigation'      => __( 'Items list navigation', 'testimonial-review' ),
		);
		$args = array(
			'labels'                    => $labels,
			'hierarchical'              => true,
			'query_var' 				=> true,
			'rewrite' 					=> true
		);
		register_taxonomy( 'testimonial-tax', array( 'testimonial-review' ), $args );
	}
	add_action( 'init', 'testimonial_review_custom_taxonomy', 0);

	/*----------------------------------------------------------------------
		Columns Declaration Function
	----------------------------------------------------------------------*/
	function testimonial_review_cols($testimonial_review_cols){
		$order='asc';

		if($_GET['order']=='asc') {
			$order='desc';
		}
		$testimonial_review_cols = array(
			"cb" 				=> 	"<input type=\"checkbox\" />",
			"title" 			=> __('Title', 'testimonial-review'),
			"thumbnail" 		=> __('Thumbnail', 'testimonial-review'),
			"fullname" 			=> __('Full Name', 'testimonial-review'),
			"description" 		=> __('Description', 'testimonial-review'),
			"review_ratings" 	=> __('Ratings', 'testimonial-review'),
			"ktstcategories" 	=> __('Categories', 'testimonial-review'),
			"date" 				=> __('Date', 'testimonial-review'),
		);
		return $testimonial_review_cols;
	}

	/*----------------------------------------------------------------------
		testimonial Value Function
	----------------------------------------------------------------------*/
	function testimonial_review_columns_display($testimonial_review_cols, $post_id){

		global $post;
		$width = (int) 80;
		$height = (int) 80;

		if ( 'thumbnail' == $testimonial_review_cols ) {
			if ( has_post_thumbnail($post_id)) {
				$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
				$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
				echo $thumb;
			}
			else {
				echo __('None');
			}
		}
		if ( 'description' 	== $testimonial_review_cols ) {
			the_excerpt();
		}
		if ( 'fullname' 	== $testimonial_review_cols ) {
			echo get_post_meta($post_id, 'review_client_name', true);
		}
		if ( 'ktstcategories' == $testimonial_review_cols ) {
			$terms = get_the_terms( $post_id , 'testimonial-tax');
			$count = count( array( $terms ) );
			if ( $terms ) {
				$i = 0;
				foreach ( $terms as $term ) {
					if ( $i+1 != $count ) {
						echo ", ";
					}
					echo '<a href="'.admin_url( 'edit.php?post_type=testimonial-review&testimonial-tax='.$term->slug ).'">'.$term->name.'</a>';
					$i++;
				}
			}
		}
		if ( 'review_ratings' 	== $testimonial_review_cols ) {
			$review_ratings = get_post_meta( $post_id, 'review_ratings', true );
			for( $i=0; $i <=4 ; $i++ ) {
			   	if ($i < $review_ratings) {
			      	$full = 'fa fa-star';
			    } else {
			      	$full = 'fa fa-star-o';
			    }
			   	echo "<i class=\"$full\"></i>";
			}
		}
	}

	add_filter( 'manage_testimonial-review_posts_columns', 'testimonial_review_cols' );
	add_action( 'manage_testimonial-review_posts_custom_column', 'testimonial_review_columns_display', 10, 2 );

	# Testimonial register taxonomies
	function testimonial_review_pro_postfilter_taxonomies($classes, $class, $ID){
		$taxonomy = 'testimonial-tax';
		$terms = get_the_terms((int) $ID, $taxonomy);
		if(!empty($terms)){
			foreach((array) $terms as $order => $term){
				if(!in_array($term->slug, $classes)){
					$classes[] = $term->slug;
				}
			}
		}
		return $classes;
	}
	add_filter( 'post_class', 'testimonial_review_pro_postfilter_taxonomies', 10, 3);

	// Register Shortcode Submenu Post Type
	function testimonial_review_add_submenu_items(){
		add_submenu_page('edit.php?post_type=testimonial-review', __('Generate Shortcode', 'testimonial-review'), __('Generate Shortcode', 'testimonial-review'), 'manage_options', 'post-new.php?post_type=testimonialshortcode');
	}
	add_action('admin_menu', 'testimonial_review_add_submenu_items');

	// Register Shortcode Post Type
	function testimonial_review_shortcode_post_register() {
		$labels = array(
			'name'                  => _x( 'Testimonial Shortcode', 'Post Type General Name', 'testimonial-review' ),
			'singular_name'         => _x( 'Testimonial Shortcode', 'Post Type Singular Name', 'testimonial-review' ),
			'menu_name'             => __( 'Testimonial Shortcode', 'testimonial-review' ),
			'name_admin_bar'        => __( 'Testimonial Shortcode', 'testimonial-review' ),
			'archives'              => __( 'Testimonial Archives', 'testimonial-review' ),
			'attributes'            => __( 'Testimonial Attributes', 'testimonial-review' ),
			'parent_item_colon'     => __( 'Parent Shortcode:', 'testimonial-review' ),
			'all_items'             => __( 'All Shortcodes', 'testimonial-review' ),
			'add_new_item'          => __( 'Add New Shortcode', 'testimonial-review' ),
			'add_new'               => __( 'Add New Shortcode', 'testimonial-review' ),
			'new_item'              => __( 'New Shortcode', 'testimonial-review' ),
			'edit_item'             => __( 'Edit Shortcode', 'testimonial-review' ),
			'update_item'           => __( 'Update Shortcode', 'testimonial-review' ),
			'view_item'             => __( 'View Shortcode', 'testimonial-review' ),
			'view_items'            => __( 'View Shortcode', 'testimonial-review' ),
			'search_items'          => __( 'Search Shortcode', 'testimonial-review' ),
			'not_found'             => __( 'Shortcode Not found', 'testimonial-review' ),
			'not_found_in_trash'    => __( 'Shortcode Not found in Trash', 'testimonial-review' ),
			'featured_image'        => __( 'Shortcode Featured Image', 'testimonial-review' ),
			'set_featured_image'    => __( 'Set testimonial featured image', 'testimonial-review' ),
			'remove_featured_image' => __( 'Remove testimonial featured image', 'testimonial-review' ),
			'use_featured_image'    => __( 'Use as testimonial featured image', 'testimonial-review' ),
			'insert_into_item'      => __( 'Insert into Shortcode', 'testimonial-review' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'testimonial-review' ),
			'items_list'            => __( 'Shortcode list', 'testimonial-review' ),
			'items_list_navigation' => __( 'Shortcode list navigation', 'testimonial-review' ),
			'filter_items_list'     => __( 'Filter Shortcode list', 'testimonial-review' ),
		);
		$args = array(
			'label'                 => __( 'Testimonial Settings', 'testimonial-review' ),
			'description'           => __( 'Testimonial Settings Post Description.', 'testimonial-review' ),
			'labels'                => $labels,
			'supports'              => array( 'title'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu' 		  => 'edit.php?post_type=testimonial-review',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'testimonialshortcode', $args );
	}
	add_action('init', 'testimonial_review_shortcode_post_register');

	# Testimonial Register Column
	function pic_testimonial_review_pro_add_shortcode_column( $columns ) {
		$order='asc';
		if($_GET['order']=='asc') {
			$order='desc';
		}
		$columns = array(
			"cb"        => "<input type=\"checkbox\" />",
			"title"     => __('Title', 'testimonial-review'),
			"shortcode" => __('Shortcode', 'testimonial-review'),
			"date"      => __('Date', 'testimonial-review'),
		);
		return $columns;
	}
	add_filter( 'manage_testimonialshortcode_posts_columns' , 'pic_testimonial_review_pro_add_shortcode_column' );

	# Testimonial Display Shortcode or Do Shortcode
	function pic_testimonial_review_pro_add_posts_shortcode_display( $column, $post_id ) {
		 if ( $column == 'shortcode' ){ ?>
			<input style="background:#ddd" type="text" onClick="this.select();" value="[testimonialreview <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" />
			<?php 
		}
	}
	add_action( 'manage_testimonialshortcode_posts_custom_column' , 'pic_testimonial_review_pro_add_posts_shortcode_display', 10, 2 );