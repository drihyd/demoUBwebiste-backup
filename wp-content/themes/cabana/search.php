<?php
/**
 * The template for displaying search results pages.
 *
 *
 * @package cabana
 */
get_header( 'inner' ); ?>

	<main>
				
		<section class="content" style="padding:90px 0px">
		
			<div class="container">
				
				<div class="post-index ten columns alpha">
				
					<h1 class="search-title"><?php _e( 'Search Results:', 'cabana' ); ?></h1>
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
					<article <?php post_class( 'post-excerpt' ); ?>>
						
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'news-large' ); ?>
						</a>
				
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						
						<?php the_excerpt(); ?>
						
						<a class="read-more-btn" href="<?php the_permalink(); ?>"><?php _e( 'Read Article', 'cabana' ); ?></a>
											
					</article><!-- end .post-excerpt -->
						
				<?php endwhile; endif; ?>
				
				<?php if ( !have_posts() ) : ?>
					
					<div class="no-posts-found ten columns alpha">

						<p><em><?php _e( 'Sorry, but no results were found. Please try the search again.', 'cabana' ); ?></em></p>
					
					</div><!-- end .no-posts-found -->
					
				<?php endif; ?>
				
				<?php if( function_exists( 'wp_pagenavi' ) ) { ?>
				<?php wp_pagenavi(); ?>   
				<?php } else { ?>      
				  <div class="post-navigation"><p><?php posts_nav_link( '&#8734;','&laquo;&laquo; Previous Posts','Older Posts &raquo;&raquo;' ); ?></p></div>
				<?php } ?>
					
				</div><!-- end .post-index -->
				
				<?php get_sidebar(); ?>
						
		</section><!-- end .content -->
	
	</main><!-- end main -->
			
<?php get_footer(); ?>