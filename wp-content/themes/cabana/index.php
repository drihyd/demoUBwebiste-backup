<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cabana
 */
get_header( 'inner' ); ?>

	<main>
	
		<section class="content">
		
			<div class="container">
			
				<?php if ( $cabana_wp['blog-layout'] == '1' ) { ?>
					
				<section class="post-index">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<article <?php post_class( 'post-excerpt' ); ?>>

						<div class="date-stamp">
							<div class="month"><?php the_time( 'M' ); ?></div>
							<div class="day"><?php the_time( 'd' ); ?></div>
						</div>
						
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
						<div class="meta-details">
							
							<p><?php _e( 'posted on', 'cabana' ); ?> <span><?php the_time( 'F jS Y' ); ?></span> <?php _e( 'in', 'cabana' ); ?> <span><?php the_category( ' & ' ); ?></span> <?php _e( 'with', 'cabana' ); ?> <span><a href="<?php the_permalink(); ?>#comments"><?php $commentscount = get_comments_number(); echo $commentscount; ?> <?php _e( 'Comments', 'cabana' ); ?></a></span></p>
						
						</div><!-- end .meta-details -->
			   
					   	<div class="post-thumbnail">

					   		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'news-large' ); ?></a>
					   		
					   	</div><!-- end .post-thumbnail -->
					   	
					   <?php the_excerpt(); ?>
					   	
					   	<a class="read-more-btn" href="<?php the_permalink(); ?>"><?php _e( 'Read Article', 'cabana' ); ?></a>

					</article><!-- end .post-excerpt -->
					
				<?php endwhile; endif; ?>
				
				<?php if( function_exists( 'wp_pagenavi' ) ) { ?>
				<?php wp_pagenavi(); ?>   
				<?php } else { ?>      
					<?php posts_nav_link( '&#8734;','&laquo;&laquo; Previous Posts','Older Posts &raquo;&raquo;' ); ?>
				<?php } ?>
								
				</section><!-- end .post-index -->
				
				<?php } ?>
				
				<?php if ( $cabana_wp['blog-layout'] == '2' ) { ?>
				
				<?php get_sidebar(); ?>
									
				<section class="post-index ten columns offset-by-one omega">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<article <?php post_class( 'post-excerpt' ); ?>>

						<div class="date-stamp">
							<div class="month"><?php the_time( 'M' ); ?></div>
							<div class="day"><?php the_time( 'd' ); ?></div>
						</div>
						
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
						<div class="meta-details">
							
							<p><?php _e( 'posted on', 'cabana' ); ?> <span><?php the_time( 'F jS Y' ); ?></span> <?php _e( 'in', 'cabana' ); ?> <span><a href=""><?php the_category( ' & ' ); ?></a></span> <?php _e( 'with', 'cabana' ); ?> <span><a href="<?php the_permalink(); ?>#comments"><?php $commentscount = get_comments_number(); echo $commentscount; ?> <?php _e( 'Comments', 'cabana' ); ?></a></span></p>
						
						</div><!-- end .meta-details -->
			   
					   	<div class="post-thumbnail">

					   		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'news-large' ); ?></a>
					   		
					   	</div><!-- end .post-thumbnail -->
					   	
					   <?php the_excerpt(); ?>
					   	
					   	<a class="read-more-btn" href="<?php the_permalink(); ?>"><?php _e( 'Read Article', 'cabana' ); ?></a>

					</article><!-- end .post-excerpt -->
					
				<?php endwhile; endif; ?>
				
				<?php if( function_exists( 'wp_pagenavi' ) ) { ?>
				<?php wp_pagenavi(); ?>   
				<?php } else { ?>      
					<?php posts_nav_link( '&#8734;','&laquo;&laquo; Previous Posts','Older Posts &raquo;&raquo;' ); ?>
				<?php } ?>
								
				</section><!-- end .post-index -->
				
				<?php } ?>
				
				<?php if ( $cabana_wp['blog-layout'] == '3' ) { ?>
				
				<section class="post-index ten columns alpha">
								
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
						<article <?php post_class( 'post-excerpt' ); ?>>
	
							<div class="date-stamp">
								<div class="month"><?php the_time( 'M' ); ?></div>
								<div class="day"><?php the_time( 'd' ); ?></div>
							</div>
							
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							
							<div class="meta-details">
								
								<p><?php _e( 'posted on', 'cabana' ); ?> <span><?php the_time( 'F jS Y' ); ?></span> <?php _e( 'in', 'cabana' ); ?> <span><a href=""><?php the_category( ' & ' ); ?></a></span> <?php _e( 'with', 'cabana' ); ?> <span><a href="<?php the_permalink(); ?>#comments"><?php $commentscount = get_comments_number(); echo $commentscount; ?> <?php _e( 'Comments', 'cabana' ); ?></a></span></p>
							
							</div><!-- end .meta-details -->
				   
						   	<div class="post-thumbnail">
	
						   		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'news-large' ); ?></a>
						   		
						   	</div><!-- end .post-thumbnail -->
						   	
						   <?php the_excerpt(); ?>
						   	
						   	<a class="read-more-btn" href="<?php the_permalink(); ?>"><?php _e( 'Read Article', 'cabana' ); ?></a>
	
						</article><!-- end .post-excerpt -->
						
					<?php endwhile; endif; ?>
					
					<?php if( function_exists( 'wp_pagenavi' ) ) { ?>
					<?php wp_pagenavi(); ?>   
					<?php } else { ?>      
						<?php posts_nav_link( '&#8734;','&laquo;&laquo; Previous Posts','Older Posts &raquo;&raquo;' ); ?>
					<?php } ?>
									
					</section><!-- end .post-index -->
					
					<?php get_sidebar(); ?>
				
				<?php } ?>
			
			</div><!-- end .container -->
		
		</section><!-- end .content -->
					
	</main><!-- end main -->
	
<?php get_footer(); ?>