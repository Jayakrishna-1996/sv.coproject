<?php
if ( 'posts' == get_option( 'show_on_front' ) ) {
	
	get_header();
	
	/******************************/
	/********    SLIDER   *********/
	/******************************/
	
	$shop_isle_slider_hide = get_theme_mod('shop_isle_slider_hide');
	
	if ( isset($shop_isle_slider_hide) && $shop_isle_slider_hide != 1 ):		
		echo '<section id="home" class="home-section home-parallax home-fade home-full-height">';
	elseif ( isset( $wp_customize ) ):
		echo '<section id="home" class="home-section home-parallax home-fade home-full-height shop_isle_hidden_if_not_customizer">';
	endif;

	if( ( isset($shop_isle_slider_hide) && $shop_isle_slider_hide != 1 ) || isset( $wp_customize ) ):

			$shop_isle_slider = get_theme_mod('shop_isle_slider',json_encode(array( array('image_url' => get_template_directory_uri().'/assets/images/slide1.jpg' ,'link' => '#', 'text' => __('ShopIsle','shop-isle'), 'subtext' => __('WooCommerce Theme','shop-isle'), 'label' => __('FIND OUT MORE','shop-isle') ), array('image_url' => get_template_directory_uri().'/assets/images/slide2.jpg' ,'link' => '#', 'text' => __('ShopIsle','shop-isle'), 'subtext' => __('Hight quality store','shop-isle') , 'label' => __('FIND OUT MORE','shop-isle')), array('image_url' => get_template_directory_uri().'/assets/images/slide3.jpg' ,'link' => '#', 'text' => __('ShopIsle','shop-isle'), 'subtext' => __('Responsive Theme','shop-isle') , 'label' => __('FIND OUT MORE','shop-isle') ))));
						
			if( !empty( $shop_isle_slider ) ):
							
				$shop_isle_slider_decoded = json_decode($shop_isle_slider);
							
				if( !empty($shop_isle_slider_decoded) ):
								
					echo '<div class="hero-slider">';
							
						echo '<ul class="slides">';
								
							foreach($shop_isle_slider_decoded as $shop_isle_slide):
										
								echo '<li class="bg-dark-30 bg-dark" style="background-image:url('.$shop_isle_slide->image_url.')">';
									echo '<div class="hs-caption">';
										echo '<div class="caption-content">';
											echo '<div class="hs-title-size-4 font-alt mb-30">'.$shop_isle_slide->text.'</div>';
											echo '<div class="hs-title-size-1 font-alt mb-40">'.$shop_isle_slide->subtext.'</div>';
											echo '<a href="'.$shop_isle_slide->link.'" class="section-scroll btn btn-border-w btn-round">'.$shop_isle_slide->label.'</a>';
										echo '</div>';
									echo '</div>';
								echo '</li>';
									
							endforeach;
							
						echo '</ul>';
								
					echo '</div>';
							
				endif;
			endif;
			
		echo '</section >';
		
	endif; /* END SLIDER */				
	
	/* Wrapper start */

	$shop_isle_bg = get_theme_mod('background_color');

	if( isset($shop_isle_bg) && $shop_isle_bg!='' ) {

		echo '<div class="main front-page-main" style="background-color: #' . $shop_isle_bg . '">';

	} else {
	
		echo '<div class="main front-page-main" style="background-color: #FFF">';
	
	}

		/***********************/
		/******  BANNERS *******/
		/***********************/
		
		$shop_isle_banners_hide = get_theme_mod('shop_isle_banners_hide');
		
		if ( isset($shop_isle_banners_hide) && $shop_isle_banners_hide != 1 ):
			echo '<section class="module-small home-banners">';
		elseif ( isset( $wp_customize ) ):
			echo '<section class="module-small home-banners shop_isle_hidden_if_not_customizer">';
		endif;

		if( ( isset($shop_isle_banners_hide) && $shop_isle_banners_hide != 1) || isset( $wp_customize ) ):
		
			$shop_isle_banners = get_theme_mod('shop_isle_banners', json_encode(array( array('image_url' => get_template_directory_uri().'/assets/images/banner1.jpg' ,'link' => '#' ),array('image_url' => get_template_directory_uri().'/assets/images/banner2.jpg' ,'link' => '#'), array('image_url' => get_template_directory_uri().'/assets/images/banner3.jpg' ,'link' => '#') )));
					
			if( !empty( $shop_isle_banners ) ):
						
				$shop_isle_banners_decoded = json_decode($shop_isle_banners);
						
				if( !empty($shop_isle_banners_decoded) ):
							
						echo '<div class="container">';

							echo '<div class="row shop_isle_bannerss_section">';
							
								foreach($shop_isle_banners_decoded as $shop_isle_banner):
									
									echo '<div class="col-sm-4"><div class="content-box mt-0 mb-0"><div class="content-box-image">';
									if ( $shop_isle_banner->link!='' ) {
										echo '<a href="' . $shop_isle_banner->link . '"><img src="' . $shop_isle_banner->image_url . '"></a>';
									}
									else {
										echo '<a><img src="' . $shop_isle_banner->image_url . '"></a>';
									}
									echo '</div></div></div>';
								
								endforeach;
						
							echo '</div>';
							
						echo '</div>';
													
				endif;
				
			endif;
			
			echo '</section>';

			echo '<hr class="divider-w">';

		endif;	/* END BANNERS */
		
		/*********************************/
		/******* Latest products *********/
		/*********************************/
		
		$shop_isle_products_hide = get_theme_mod('shop_isle_products_hide');
	
		/* Latest products */

		if ( isset($shop_isle_products_hide) && $shop_isle_products_hide != 1 ):		
			echo '<section id="latest" class="module-small">';
		elseif ( isset( $wp_customize ) ):
			echo '<section id="latest" class="module-small shop_isle_hidden_if_not_customizer">';
		endif;

		if( ( isset($shop_isle_products_hide) && $shop_isle_products_hide != 1 ) || isset( $wp_customize ) ):

				echo '<div class="container">';

					$shop_isle_products_title = get_theme_mod('shop_isle_products_title',__( 'Latest products', 'shop-isle' ));
					if( !empty($shop_isle_products_title) ):
						echo '<div class="row">';
							echo '<div class="col-sm-6 col-sm-offset-3">';
								echo '<h2 class="module-title font-alt product-hide-title">'.$shop_isle_products_title.'</h2>';
							echo '</div>';
						echo '</div>';
					endif;
					
					$shop_isle_products_shortcode = get_theme_mod('shop_isle_products_shortcode');
					$shop_isle_products_category = get_theme_mod('shop_isle_products_category'); 
					
					/*********************************/
					/**** Woocommerce shortcode ******/
					/*********************************/
					
					echo '<div class="products_shortcode">';
						if( isset($shop_isle_products_shortcode) && !empty($shop_isle_products_shortcode) ):	
							echo do_shortcode($shop_isle_products_shortcode);
					echo '</div>';

					/**********************************/
					/***** Products from category *****/
					/**********************************/
					
					elseif( isset($shop_isle_products_category) && !empty($shop_isle_products_category) && ($shop_isle_products_category != '-') ):	
						
						$shop_isle_latest_args = array( 'post_type' => 'product', 'posts_per_page' => 8, 'orderby' =>'date','order' => 'DESC', 'tax_query' => array(
							array(
								'taxonomy'  => 'product_cat',
								'field'     => 'term_id', 
								'terms'     => $shop_isle_products_category
							)
						) );
						$shop_isle_latest_loop = new WP_Query( $shop_isle_latest_args );
						
						if( $shop_isle_latest_loop->have_posts() ):
						
							echo '<div class="row multi-columns-row">';
						
							while( $shop_isle_latest_loop->have_posts() ) : 
							
								$shop_isle_latest_loop->the_post(); 
								global $product; 
								
								echo '<div class="col-sm-6 col-md-3 col-lg-3">';
									echo '<div class="shop-item">';
										echo '<div class="shop-item-image">';
										
											if (has_post_thumbnail( $shop_isle_latest_loop->post->ID )):
												echo get_the_post_thumbnail($shop_isle_latest_loop->post->ID, 'shop_catalog'); 
											else:
												if( function_exists('woocommerce_placeholder_img_src') ):
													echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="65px" height="115px" />';
												endif;	
											endif;
											
											echo '<div class="shop-item-detail">';
												if(!empty($product)):
													echo '<a class="btn btn-round btn-b" href="'.$product->add_to_cart_url().'"><span class="icon-basket"></span>'.__('Add To Cart','shop-isle').'</a>';
												endif;	
											echo '</div>';
										echo '</div>';
										echo '<h4 class="shop-item-title font-alt"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
										if( function_exists('get_woocommerce_currency_symbol') && !empty($product) ):
											if( function_exists('get_woocommerce_price_format') ):
												$format_string = get_woocommerce_price_format();
											endif;	
											if( !empty($format_string) ):
												switch ( $format_string ) {
													case '%1$s%2$s' :
														echo get_woocommerce_currency_symbol().$product->price;
													break;
													case '%2$s%1$s' :
														echo $product->price.get_woocommerce_currency_symbol();
													break;
													case '%1$s&nbsp;%2$s' :
														echo get_woocommerce_currency_symbol().' '.$product->price;
													break;
													case '%2$s&nbsp;%1$s' :
														echo $product->price.' '.get_woocommerce_currency_symbol();
													break;
												}
											else:
												echo get_woocommerce_currency_symbol().$product->price;
											endif;
										endif;
									echo '</div>';
								echo '</div>';

							endwhile; 
							
							echo '</div>';
							
							echo '<div class="row mt-30">';
								echo '<div class="col-sm-12 align-center">';
									if( function_exists('woocommerce_get_page_id') ):
										echo '<a href="'.get_permalink( woocommerce_get_page_id( 'shop' )).'" class="btn btn-b btn-round">'.__('See all products','shop-isle').'</a>';
									endif;
								echo '</div>';
							echo '</div>';
						
						else:

							echo '<div class="row">';
								echo '<div class="col-sm-6 col-sm-offset-3">';
									echo '<p class="">'.__('No products found.','shop-isle').'</p>';
								echo '</div>';
							echo '</div>';
							
						endif;
						
						wp_reset_postdata(); 
					
					/*****************************/
					/*****  Latest products ******/
					/*****************************/
					
					else:
					
						$shop_isle_latest_args = array( 'post_type' => 'product', 'posts_per_page' => 8, 'orderby' =>'date','order' => 'DESC' );
						
						$shop_isle_latest_loop = new WP_Query( $shop_isle_latest_args );
						
						if( $shop_isle_latest_loop->have_posts() ):
						
							echo '<div class="row multi-columns-row">';
						
							while( $shop_isle_latest_loop->have_posts() ) : 
							
								$shop_isle_latest_loop->the_post(); 
								global $product; 
								
								echo '<div class="col-sm-6 col-md-3 col-lg-3">';
									echo '<div class="shop-item">';
										echo '<div class="shop-item-image">';
										
											if (has_post_thumbnail( $shop_isle_latest_loop->post->ID )):
												echo get_the_post_thumbnail($shop_isle_latest_loop->post->ID, 'shop_catalog'); 
											else:
												if( function_exists('woocommerce_placeholder_img_src') ):
													echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="65px" height="115px" />';
												endif;	
											endif;
											
											echo '<div class="shop-item-detail">';
												if(!empty($product)):
													echo '<a class="btn btn-round btn-b" href="'.$product->add_to_cart_url().'"><span class="icon-basket"></span>'.__('Add To Cart','shop-isle').'</a>';
												endif;
											echo '</div>';
										echo '</div>';
										echo '<h4 class="shop-item-title font-alt"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
										if( function_exists('get_woocommerce_currency_symbol') && !empty($product) ):
											if( function_exists('get_woocommerce_price_format') ):
												$format_string = get_woocommerce_price_format();
											endif;	
											if( !empty($format_string) ):
												switch ( $format_string ) {
													case '%1$s%2$s' :
														echo get_woocommerce_currency_symbol().$product->price;
													break;
													case '%2$s%1$s' :
														echo $product->price.get_woocommerce_currency_symbol();
													break;
													case '%1$s&nbsp;%2$s' :
														echo get_woocommerce_currency_symbol().' '.$product->price;
													break;
													case '%2$s&nbsp;%1$s' :
														echo $product->price.' '.get_woocommerce_currency_symbol();
													break;
												}
											else:
												echo get_woocommerce_currency_symbol().$product->price;
											endif;
										endif;
									echo '</div>';
								echo '</div>';

							endwhile; 
							
							echo '</div>';
							
							echo '<div class="row mt-30">';
								echo '<div class="col-sm-12 align-center">';
									if( function_exists('woocommerce_get_page_id') ):
										echo '<a href="'.get_permalink( woocommerce_get_page_id( 'shop' )).'" class="btn btn-b btn-round">'.__('See all products','shop-isle').'</a>';
									endif;
								echo '</div>';
							echo '</div>';
						
						else:

							echo '<div class="row">';
								echo '<div class="col-sm-6 col-sm-offset-3">';
									echo '<p class="">'.__('No products found.','shop-isle').'</p>';
								echo '</div>';
							echo '</div>';
							
						endif;
						
						wp_reset_postdata();	
						
					endif;

			echo '</div><!-- .container -->';
		
		echo '</section>';
		
	endif; /* END Latest products */
	
	/**********************************/
	/*********    VIDEO **************/
	/*********************************/
	
	$shop_isle_video_hide = get_theme_mod('shop_isle_video_hide');
	$shop_isle_yt_link = get_theme_mod('shop_isle_yt_link');
	
	if( isset($shop_isle_video_hide) && $shop_isle_video_hide != 1 && !empty($shop_isle_yt_link) ):	
		echo '<section class="module module-video bg-dark-30">';
	elseif ( !empty($shop_isle_yt_link) && isset( $wp_customize ) ):
		echo '<section class="module module-video bg-dark-30 shop_isle_hidden_if_not_customizer">';
	endif;

	if( ( isset($shop_isle_video_hide) && $shop_isle_video_hide != 1 && !empty($shop_isle_yt_link) ) || ( !empty($shop_isle_yt_link) && isset( $wp_customize ) )  ):	

				$shop_isle_video_title = get_theme_mod('shop_isle_video_title');
				if( !empty($shop_isle_video_title) ):
			
					echo '<div class="container">';

						echo '<div class="row">';
							echo '<div class="col-sm-12">';
								echo '<h2 class="module-title font-alt mb-0 video-title">'.$shop_isle_video_title.'</h2>';
							echo '</div>';
						echo '</div>';

					echo '</div>';
			
				endif;

				?>
				<!-- Youtube player start-->
				<div class="video-player" data-property="{videoURL:'<?php echo $shop_isle_yt_link; ?>', containment:'.module-video', startAt:0, mute:true, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:25}"></div>
		 		<!-- Youtube player end -->
				<?php

				
		echo '</section>';
		
	endif; /* END VIDEO */	
	
	
	/******************************/
	/**** Products slider *********/
	/******************************/
	
	$shop_isle_products_slider_hide = get_theme_mod('shop_isle_products_slider_hide');

	if ( isset($shop_isle_products_slider_hide) && $shop_isle_products_slider_hide != 1 ):		
		echo '<section class="home-product-slider">';
	elseif ( isset( $wp_customize ) ):
		echo '<section class="home-product-slider shop_isle_hidden_if_not_customizer">';
	endif;

	if ( ( isset($shop_isle_products_slider_hide) && $shop_isle_products_slider_hide != 1)  || isset( $wp_customize ) ):

			echo '<div class="container">';

				$shop_isle_products_slider_title = get_theme_mod('shop_isle_products_slider_title',__( 'Exclusive products', 'shop-isle' ));
				$shop_isle_products_slider_subtitle = get_theme_mod('shop_isle_products_slider_subtitle',__( 'Special category of products', 'shop-isle' ));
			
				if( !empty($shop_isle_products_slider_title) || !empty($shop_isle_products_slider_subtitle) ):
					echo '<div class="row">';
						echo '<div class="col-sm-6 col-sm-offset-3">';
							if( !empty($shop_isle_products_slider_title) ):
								echo '<h2 class="module-title font-alt home-prod-title">'.$shop_isle_products_slider_title.'</h2>';
							endif;
							if( !empty($shop_isle_products_slider_subtitle) ):
								echo '<div class="module-subtitle font-serif home-prod-subtitle">'.$shop_isle_products_slider_subtitle.'</div>';
							endif;	
						echo '</div>';
					echo '</div><!-- .row -->';
				endif;	
		
				$shop_isle_products_slider_category = get_theme_mod('shop_isle_products_slider_category');
			
				if( !empty($shop_isle_products_slider_category) && ($shop_isle_products_slider_category != '-') ):
			
					$shop_isle_products_slider_args = array( 'post_type' => 'product', 'posts_per_page' => 10, 'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'term_id',
							'terms'    => $shop_isle_products_slider_category,
						)
					));

					$shop_isle_products_slider_loop = new WP_Query( $shop_isle_products_slider_args );

					if( $shop_isle_products_slider_loop->have_posts() ):

							echo '<div class="row">';

								echo '<div class="owl-carousel text-center" data-items="5" data-pagination="false" data-navigation="false">';
				
									while ( $shop_isle_products_slider_loop->have_posts() ) : 
									
										$shop_isle_products_slider_loop->the_post(); 
										
										echo '<div class="owl-item">';
											echo '<div class="col-sm-12">';
												echo '<div class="ex-product">';
													if( function_exists('woocommerce_get_product_thumbnail') ):
														echo '<a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().'</a>';
													endif;	
													echo '<h4 class="shop-item-title font-alt"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
													if( function_exists('get_woocommerce_currency_symbol') && !empty($product) ):
														if( function_exists('get_woocommerce_price_format') ):
															$format_string = get_woocommerce_price_format();
														endif;	
														if( !empty($format_string) ):
															switch ( $format_string ) {
																case '%1$s%2$s' :
																	echo get_woocommerce_currency_symbol().$product->price;
																break;
																case '%2$s%1$s' :
																	echo $product->price.get_woocommerce_currency_symbol();
																break;
																case '%1$s&nbsp;%2$s' :
																	echo get_woocommerce_currency_symbol().' '.$product->price;
																break;
																case '%2$s&nbsp;%1$s' :
																	echo $product->price.' '.get_woocommerce_currency_symbol();
																break;
															}
														else:
															echo get_woocommerce_currency_symbol().$product->price;
														endif;
													endif;
												echo '</div>';
											echo '</div>';
										echo '</div>';
	
									endwhile; 
	
									wp_reset_postdata();
								echo '</div>';

							echo '</div>';	

					endif;
					
				else:

					$shop_isle_products_slider_args = array( 'post_type' => 'product', 'posts_per_page' => 10);

					$shop_isle_products_slider_loop = new WP_Query( $shop_isle_products_slider_args );

					if( $shop_isle_products_slider_loop->have_posts() ):

							echo '<div class="row">';

								echo '<div class="owl-carousel text-center" data-items="5" data-pagination="false" data-navigation="false">';
				
									while ( $shop_isle_products_slider_loop->have_posts() ) : 
									
										$shop_isle_products_slider_loop->the_post(); 
										
										echo '<div class="owl-item">';
											echo '<div class="col-sm-12">';
												echo '<div class="ex-product">';
													if( function_exists('woocommerce_get_product_thumbnail') ):
														echo '<a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().'</a>';
													endif;	
													echo '<h4 class="shop-item-title font-alt"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
													if( function_exists('get_woocommerce_currency_symbol') && !empty($product) ):
														if( function_exists('get_woocommerce_price_format') ):
															$format_string = get_woocommerce_price_format();
														endif;	
														if( !empty($format_string) ):
															switch ( $format_string ) {
																case '%1$s%2$s' :
																	echo get_woocommerce_currency_symbol().$product->price;
																break;
																case '%2$s%1$s' :
																	echo $product->price.get_woocommerce_currency_symbol();
																break;
																case '%1$s&nbsp;%2$s' :
																	echo get_woocommerce_currency_symbol().' '.$product->price;
																break;
																case '%2$s&nbsp;%1$s' :
																	echo $product->price.' '.get_woocommerce_currency_symbol();
																break;
															}
														else:
															echo get_woocommerce_currency_symbol().$product->price;
														endif;
													endif;
												echo '</div>';
											echo '</div>';
										echo '</div>';
	
									endwhile; 
	
									wp_reset_postdata();
								echo '</div>';

							echo '</div>';	

					endif;
				
				endif;

			echo '</div>';
			
		echo '</section>';		

	endif; /* END Products slider */	
	get_footer();
	
} else {
	include( get_page_template() );
}
?>