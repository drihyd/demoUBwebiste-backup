<?php
/**
 * The template for displaying all single posts.
 *
 * 
 * @package cabana
 */
get_header( 'inner' ); ?>

	<main>
		
		<section class="content">
		
			<div class="container">
			
				
				<section class="post-index sixteen columns alpha page_content">
								
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
						<article <?php post_class( 'post-single' ); ?>>
		
							
							
							<h2><?php the_title(); ?></h2>
							
							<div class="meta-details">
							
							</div><!-- end .meta-details -->
				   
						   	<div class="post-thumbnail" style="">
		
								   <?php the_post_thumbnail( 'news-large' ); 
								   ?>
						   		
						   	</div><!-- end .post-thumbnail -->
						   	
						   	<?php the_content(); ?>
						   	
						   	<?php wp_link_pages(); ?>
		
						</article><!-- end .post-single -->
						
					<?php endwhile; endif; ?>
	
							
					</section><!-- end .post-index -->
				
				<?php get_sidebar(); ?>
				
			
			</div><!-- end .container -->
		
		</section><!-- end .content -->
					
	</main><!-- end main -->

<?php get_footer(); ?>