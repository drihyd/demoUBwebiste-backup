<?php
/**
 * The template for WooCommerce pages.
 *
 *
 * @package cabana
 */
get_header( 'inner' ); ?>

	<main>
	
		<section class="content inner">
		
			<div class="container">
				
				<?php if ( !is_cart() && !is_checkout() && !is_account_page() ) { ?>
			
				<div class="eleven columns alpha">
				
				<?php
					/**
					 * woocommerce_before_main_content hook
					 *
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>
			
				<?php woocommerce_content(); ?>
			
				</div>
			
			<?php get_sidebar( 'shop' ); ?>
			
			<?php } else { ?>
			
			<?php } ?>
						
			</div><!-- end .container -->
		
		</section><!-- end .content -->
					
	</main><!-- end main -->
	
<?php get_footer(); ?>