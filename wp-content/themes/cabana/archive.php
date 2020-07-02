<?php
/**
 * The template for displaying archive pages.
 *
 *
 * @package cabana
 */
get_header( 'inner' ); ?>

	<main>
	
		<section class="content">
		
      <div class="top_portion">
    		<div class="container">
			    <h1 class="page_title"><?php single_cat_title(); ?></h1>
				  <div class="page_excerpt">We have worked on projects across the length and bredth of India, applying our knowledge of blasting and quarrying to fulfill challenging and demanding projects for small to large scale industries. Please click on the links below to find details of some of our projects.</div>
          <div class="clear"></div>
        </div><!-- .container -->
        </div><!-- .top_portion -->
      
			<div class="container">
		
				<h3 class="tagline"><span>Exploration to Excavation and Everything in-between & Beyond</span></h3>
          <?php //get_sidebar(); ?>
				
				<div class="post-index sixteen columns omega">
											
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
					<article <?php post_class( 'post-excerpt' ); ?>>
			
            <div class="post-thumbnail">
	
					   		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'news-large' ); ?></a>
					   		
					   	</div><!-- end .post-thumbnail -->
						<div class="project_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
	
					</article><!-- end .post-excerpt -->
						
				<?php endwhile; endif; ?>

				<?php wp_pagenavi(); ?>   
						
				</div><!-- end .post-index -->
				
						
			</div><!-- end .container -->
		
		</section><!-- end .content -->
					
	</main><!-- end main -->
	
<?php get_footer(); ?>