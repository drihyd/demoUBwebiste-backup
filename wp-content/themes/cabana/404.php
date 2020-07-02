<?php
/**
 * The template for displaying the 404 page.
 *
 *
 * @package cabana
 */
get_header( 'inner' ); ?>

	<main>
	
		<section class="content">
		
			<div class="container">
			
				<div class="page-not-found">
						
					<h1><?php _e( 'It seems a page is missing.', 'cabana' ); ?></h1>
					<p><?php _e( 'We can\'t find what you\'re looking for. Please use the button below to jump to the Homepage.', 'cabana' ); ?></p>
					<a class="read-more-btn" href="<?php echo home_url(); ?>"><?php _e( 'Go to the Homepage', 'cabana' ); ?></a>
				
				</div><!-- end .page-not-found -->						
			
			</div><!-- end .container -->
		
		</section><!-- end .content -->
					
	</main><!-- end main -->
	
<?php get_footer(); ?>