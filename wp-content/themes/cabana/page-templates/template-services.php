<?php
/**
 * Template Name: Services
 * Description: The template for displaying the services page.
 *
 *
 * @package cabana
 */
get_header( 'inner' ); ?>

	<main>
	
		<section class="content inner">
		
			<div class="container">
			
				<h1><?php the_title(); ?></h1>
			
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
					<?php the_content(); ?>
					
				<?php endwhile; endif; ?>
				
				<div class="service-items">
	
				<?php
				query_posts( array(
				    'post_type' => 'services',
				    'orderby' => 'menu_order',
				    'order' => 'ASC',
				    'posts_per_page' => -1
				) );
				?>
				<div class="one-third column">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
					
						<div class="service-item">
							
							<div class="details">
								<?php echo do_shortcode( get_post_meta( $post->ID, 'gt_service_icon', $single = true ) ) ?>
								<h2><a href="<?php echo get_post_meta( $post->ID, 'gt_service_url', true ) ?>"><?php the_title(); ?></a></h2>
								<?php the_content(); ?>
							</div>
							
						</div><!-- end .service-item -->
					
					
				<?php endwhile; endif; ?>	
					</div><!-- end .one-third -->
								
				</div><!-- end .service-items -->
						
			</div><!-- end .container -->
		
		</section><!-- end .content -->
					
	</main><!-- end main -->

<?php get_footer(); ?>