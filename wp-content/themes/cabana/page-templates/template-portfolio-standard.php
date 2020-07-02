<?php
/**
 * Template Name: Portfolio (Standard)
 * Description: The template for displaying the portfolio index (standard).
 *
 *
 * @package cabana
 */
get_header( 'inner' ); ?>

	<main>
	
		<section class="content">
				
			<div class="container">
			
				<h1><?php the_title(); ?></h1>
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<?php the_content(); ?>
					
				<?php endwhile; endif; ?>
		
				<div class="row">
										
					<?php if ( $cabana_wp['work-navigation-visibility'] == '1' ) { ?>
										
					<div class="portfolio-filter">
							
						<ul class="filter">
							<li><a href="#" class="current" data-filter="*"><?php _e( 'Show all', 'cabana' ); ?></a></li>
							<?php
							$categories = get_categories( array(
							    'type' => 'post',
							    'taxonomy' => 'project-type'
							) );
							foreach ( $categories as $category ) {
							    $group = $category->slug;
							    echo "<li class='project-type'><a href='#' data-filter='.$group'>" . $category->cat_name . "</a></li>";
							}
							?>
						</ul><!-- end .filter -->
						
					</div><!-- end .portfolio-filter -->
					
					<?php } ?>
					
				</div><!-- end .row -->
				
				<div class="row">
				
					<div class="portfolio-items standard">
					
					<?php
					query_posts( array(
					    'post_type' => 'portfolio',
					    'orderby' => 'menu_order',
					    'order' => 'ASC',
					    'posts_per_page' => -1
					) );
					?>
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php 
					    $terms =  get_the_terms( $post->ID, 'project-type' ); 
					    $term_list = '';
					    if( is_array($terms) ) {
					        foreach( $terms as $term ) {
						        $term_list .= urldecode($term->slug);
						        $term_list .= ' ';
						    }
					    }
					?>
										
						<div <?php post_class( "$term_list one-third column" ); ?> id="post-<?php the_ID(); ?>">
						
							<div class="project-item">
								
								<div class="project-image">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'portfolio-thumb' ); ?>
										<div class="overlay">
											<div class="details">
												<h2><?php the_title(); ?></h2>
												<p><?php _e( 'developed for', 'cabana' ); ?> <span><?php echo get_post_meta( $post->ID, 'gt_client_name', true ) ?></span></p>
											</div>
										</div>
									</a>
								</div><!-- end .project-image -->
							
							</div><!-- end .project-item -->
							
						</div><!-- end .one-third -->
						
					<?php endwhile; endif; ?>
			
					</div><!-- end .portfolio-items -->
				
				</div><!-- end .row -->
				
			</div><!-- end .container -->				
						
		</section><!-- end .content -->
							
	</main><!-- end main -->

<?php get_footer(); ?>