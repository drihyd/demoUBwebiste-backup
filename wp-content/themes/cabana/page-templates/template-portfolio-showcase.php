<?php
/**
 * Template Name: Homepage (Portfolio Showcase)
 * Description: The template for displaying the custom homepage.
 *
 *
 * @package cabana
 */
get_header(); ?>

	<main>
	
		<section class="homepage-portfolio">
		
			<div class="container">

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

			</div><!-- end .container -->
				
			<div class="row">
				
				<div class="portfolio-items full-width">
				
					<?php
					query_posts( array(
					    'post_type' => 'portfolio',
					    'orderby' => 'menu_order',
					    'order' => 'ASC',
					    'posts_per_page' => $cabana_wp['work-items-select']
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
							
					<div <?php post_class( "$term_list" ); ?> id="post-<?php the_ID(); ?>">
					
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

		</section><!-- end .homepage-portfolio -->
	
	</main><!-- end main -->

<?php get_footer(); ?>