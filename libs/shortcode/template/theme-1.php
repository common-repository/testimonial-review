<?php

    if( !defined( 'ABSPATH' ) ){
        exit;
    }
    
	if($review_testimonial_type == 1){
		 if($review_testimonial_grid_type == 1){
		 	if($review_testimonial_grid_style == 1){?>
				<style type="text/css">
					.testimonialreview0-<?php echo esc_attr( $postid );?> {
						display: flex;
						flex-wrap: wrap;
					}
					.testimonialreview0-<?php echo esc_attr( $postid );?> .testimonialreview0-single-items-<?php echo esc_attr( $postid );?> {
						display: block;
						overflow: hidden;
						width:100%;
						height:100%;
					}
					.testimonialreview0-<?php echo esc_attr( $postid );?> .testimonialreview0-single-description{}
					.testimonialreview0-<?php echo esc_attr( $postid );?> .testimonialreview0-single-description p{
						margin: 0px;
						display: block;
						overflow: hidden;
						color: <?php echo $review_items_text_color;?>;
						font-size: <?php echo $review_items_text_size;?>px;
					}
					.testimonialreview0-<?php echo esc_attr( $postid );?> .testimonialreview0-single-title{
						display: block;
						overflow: hidden;
						margin-bottom: 12px;
						font-size: <?php echo $review_title_font_size;?>px;
						color: <?php echo $review_title_color;?>;
						text-transform:<?php echo $review_title_transform;?> ;
						font-style: <?php echo $review_title_fontstyle;?>;
						font-weight: 700;
					}
					.testimonialreview0-<?php echo esc_attr( $postid );?> .testimonialreview0-author-name {
						font-size: <?php echo $review_name_font_size;?>px;
						color: <?php echo $review_name_color;?>;
						text-transform:<?php echo $review_name_transform;?> ;
						font-style: <?php echo $review_name_fontstyle;?>;
						font-weight: 700;
					}
					.testimonialreview0-<?php echo esc_attr( $postid );?> .testimonialreview0-author-name span.testimonialreview0-desigation{
						font-size: <?php echo $review_designation_font_size;?>px;
						color: <?php echo $review_designation_color;?>;
						text-transform:<?php echo $review_designation_transform;?> ;
						font-style: <?php echo $review_designation_fontstyle;?>;
						font-weight: 400;
					}
					.testimonialreview0-<?php echo esc_attr( $postid );?> .testimonialreview0-author-info {
					    display: flex;
					    align-items: center;
					    justify-content: left;
					}
					.testimonialreview0-<?php echo esc_attr( $postid );?> .testimonialreview0-author-thumb {
						margin-right: 15px;
						width: 80px;
						height: auto;
						border-radius: 50%;
						overflow: hidden;
					}
					.testimonialreview0-<?php echo esc_attr( $postid );?> .testimonialreview0-author-thumb > img {
					  	width: 100%;
					}
					.testimonialreview0-<?php echo esc_attr( $postid );?> .testimonialreview-urls,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .testimonialreview-urls a {
						outline: none;
						text-decoration: none;
						box-shadow: none;
						border: none;
						padding: 4px 0px;
						font-size: <?php echo $review_company_url_size;?>px;
						color: <?php echo $review_company_url_color;?>;
					}
					.testimonialreview0-<?php echo esc_attr( $postid );?> .testimonial-rating-<?php echo esc_attr( $postid ); ?> i.fa{
						font-size: <?php echo $review_ratings_icon_size;?>px;
						color: <?php echo $review_ratings_icon_color;?>;
						padding:0px 3px;
					}
					.testimonialreview0-<?php echo esc_attr( $postid );?> .testimonialreview0-items-info-<?php echo esc_attr( $postid );?> {
					  background: <?php echo $review_items_bgcolors;?>;
					  border-radius: 5px;
					  border: none;
					  position: relative;
					  color: #666;
					  padding: 25px;
					  margin-bottom: 30px;
					}
					.testimonialreview0-items-info-<?php echo esc_attr( $postid );?>:after {
					  position: absolute;
					  visibility: visible;
					  width: 0;
					  height: 0;
					  content: "";
					  border-style: solid;
					  border-color: transparent;
					  border-bottom: 0;
					}
					.testimonialreview0-items-info-<?php echo esc_attr( $postid );?>:after {
					  border-width: 15px;
					  border-top-color:<?php echo $review_items_bgcolors;?>;
					  bottom: -15px;
					  left: 15px;
					}
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-lg-1,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-lg-2,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-lg-3,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-lg-4,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-lg-5,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-lg-6,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-md-1,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-md-2,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-md-3,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-md-4,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-md-5,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-md-6,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-sm-1,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-sm-2,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-sm-3,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-sm-4,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-sm-5,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-sm-6,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-xs-1,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-xs-2,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-xs-3,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-xs-4,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-xs-5,
					.testimonialreview0-<?php echo esc_attr( $postid );?> .reviewtestimonial-col-xs-6 {
						float: left;
						margin-bottom: 15px !important;
						min-height: 1px;
						padding-left: 5px !important;
						padding-right: 5px !important;
						position: relative;
					}					
				</style>
				
				<div class="testimonialreview0-<?php echo esc_attr( $postid );?>">
					<?php while ( $review_query->have_posts() ) : $review_query->the_post();
						$review_client_name 				= get_post_meta( $post->ID, 'review_client_name', true );
						$review_company_name 				= get_post_meta( $post->ID, 'review_company_name', true );
						$review_company_designation 		= get_post_meta( $post->ID, 'review_company_designation', true );
						$review_web_urls 					= get_post_meta( $post->ID, 'review_web_urls', true );
						$review_ratings 					= get_post_meta( $post->ID, 'review_ratings', true );
						$ppoint_thumb 						= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						if ( empty( $ppoint_thumb ) ) $ppoint_thumb = get_avatar_url( -1 );
						$content 			= apply_filters( 'the_content', get_the_content() );
						?>

						<div class="reviewtestimonial-col-lg-<?php echo $review_testimonial_columns;?> reviewtestimonial-col-md-2 reviewtestimonial-col-sm-2 reviewtestimonial-col-xs-1">
							<div class="testimonialreview0-single-items-<?php echo esc_attr( $postid );?>">
								<div class="testimonialreview0-items-info-<?php echo esc_attr( $postid );?>">
									<?php if( !empty($post->post_title)){ 
										if ( $review_title_hide == 1){ ?>
											<div class="testimonialreview0-single-title"><?php echo the_title();?></div>
										<?php } ?>
									<?php } ?>
									<div class="testimonialreview0-single-description">
										<?php echo the_content();?>
									</div>
								</div>
								<div class="testimonialreview0-author-info">
									<div class="testimonialreview0-author-thumb">
										<img src="<?php echo $ppoint_thumb;?>" alt="<?php echo the_title();?>" />
									</div>
									<div class="testimonialreview0-title-area">
										<div class="testimonialreview0-author-name">
											<?php echo esc_attr($review_client_name);?>
											<?php if( !empty( $review_company_designation ) ){ ?>
												<span class="testimonialreview0-desigation"> - <?php echo esc_attr($review_company_designation);?></span>
											<?php } ?>
										</div>
										<?php if( ! empty($review_web_urls) || !empty( $review_company_name )){?>
											<div class="testimonialreview-urls">
												<?php if( ! empty($review_web_urls)){ ?>
													<a href="<?php echo esc_url($review_web_urls);?>" target="_blank"><?php echo esc_attr($review_company_name);?></a>
												<?php }else{ ?>
													<?php echo esc_html( $review_company_name ); ?>
												<?php } ?>
											</div>
										<?php } ?>
										<div class="testimonial-rating-<?php echo esc_attr( $postid ); ?>">
							                <?php for( $i=0; $i <=4 ; $i++ ) {
									   			   	if ($i < $review_ratings) {
									   			      	$full = 'fa fa-star';
									   			    } else {
									   			      	$full = 'fa fa-star-o';
									   			    }
									   			   	echo "<i class=\"$full\"></i>";
									   			}
									   		?>
								   		</div>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile;?>
					<?php wp_reset_query();?>
				</div>

		 	<?php
		 	}elseif($review_testimonial_grid_style == 2){?>
				<p>Available only for Pro Version</p>
		 	<?php
		 	}
		}
		elseif($review_testimonial_grid_type == 2){?>
			<p>Available only for Pro Version</p>
		<?php
		}
	}elseif($review_testimonial_type == 2){ ?>
		<p>Available only for Pro Version</p>
	<?php } ?>