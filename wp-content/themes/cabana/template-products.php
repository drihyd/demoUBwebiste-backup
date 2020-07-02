<?php
/**
 * Template Name: Products - Marketing
 */
get_header( 'inner' ); ?>

<main>
	
		<section class="content inner products">
		
			<?php if ( $cabana_wp['page-layout'] == '1' ) { ?>
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
        <div class="top_portion">
    		<div class="container">
			    <h1 class="page_title"><?php the_title(); ?></h1>
				  <div class="page_excerpt"><?php $key="summary"; echo get_post_meta($post->ID, $key, true); ?></div>
          <div class="clear"></div>
        </div><!-- .container -->
        </div><!-- .top_portion -->
        
      <div class="container">
        <h3 class="tagline"><span>Exploration to Excavation and Everything in-between &amp; Beyond</span></h3>
          
        <div class="page_content">
				<?php the_content(); ?>
        </div><!-- .page_content -->
				
			<?php endwhile; endif; ?>
			
			<?php } ?>
			
			<?php if ( $cabana_wp['page-layout'] == '2' ) { ?>
			
			<?php get_sidebar(); ?>
			
				<div class="ten columns offset-by-one omega">
			
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
					<h1><?php the_title(); ?></h1>
					
					<?php the_content(); ?>
					
				<?php endwhile; endif; ?>
				
				</div>
			
			<?php } ?>
			
			<?php if ( $cabana_wp['page-layout'] == '3' ) { ?>
			
				<div class="ten columns alpha">
			
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
					<h1><?php the_title(); ?></h1>
					
					<?php the_content(); ?>
					
				<?php endwhile; endif; ?>
			
				</div>
			
			<?php get_sidebar(); ?>
			
			<?php } ?>
						
			</div><!-- end .container -->
		
		</section><!-- end .content -->
					
	</main><!-- end main -->
	
<?php get_footer(); ?>