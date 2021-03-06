<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Full width
 *
 */

get_header(); ?>

<!-- Wrapper start -->
	<div class="main">
	
		<!-- Header section start -->
		<?php
		$shop_isle_header_image = get_header_image();
		if( !empty($shop_isle_header_image) ):
			echo '<section class="module bg-dark" data-background="'.$shop_isle_header_image.'">';
		else:
			echo '<section class="module bg-dark">';
		endif;
		?>
			<div class="container">

				<div class="row">

					<div class="col-sm-6 col-sm-offset-3">
						<h1 class="module-title font-alt"><?php the_title(); ?></h1>
						
						<?php

						/* Header description */

						$shop_isle_shop_id = get_the_ID();

						if( !empty($shop_isle_shop_id) ):

							$shop_isle_page_description = get_post_meta($shop_isle_shop_id, 'shop_isle_page_description');

							if( !empty($shop_isle_page_description[0]) ):
								echo '<div class="module-subtitle font-serif mb-0">'.$shop_isle_page_description[0].'</div>';
							endif;

						endif;
						?>
					</div>

				</div><!-- .row -->

			</div>
		</section>
		<!-- Header section end -->
		
		

		<!-- Pricing start -->
		<section class="module">
			<div class="container">
			
				<div class="row">

					<!-- Content column start -->
					<div class="col-sm-12">
			
					<?php
					/**
					* @hooked woocommerce_breadcrumb - 10
					*/
					do_action( 'shop_isle_content_top' ); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						do_action( 'storefront_page_before' );
						?>

						<?php get_template_part( 'content', 'page' ); ?>

						<?php
						/**
						 * @hooked shop_isle_display_comments - 10
						 */
						do_action( 'storefront_page_after' );
						?>

					<?php endwhile; // end of the loop. ?>
					
					</div>
					
				</div> <!-- .row -->	

			</div>
		</section>
		<!-- Pricing end -->


<?php get_footer(); ?>
