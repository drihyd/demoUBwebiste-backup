<?php
/**
 * Template Name: Resources Inner
 */
get_header( 'inner' ); ?>

	<main>
	
		<section class="content inner resources_page">
		
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
         <div class="top_portion">
    		<div class="container">
			    <h1 class="page_title"><?php the_title(); ?></h1>
			  </div><!-- .container -->
        </div><!-- .top_portion -->
       
			<div class="container">        
       
				<div class="page_content">
				
        <div class="breadcrumb"><a href="/">Home</a> &nbsp//&nbsp; <a href="/resources">Resources</a> &nbsp;//&nbsp; <?php the_title(); ?></div>
          <?php the_content(); ?>
        </div><!-- .page_content -->
				
			<?php endwhile; endif; ?>
						
			</div><!-- end .container -->
		
		</section><!-- end .content -->
					
	</main><!-- end main -->
	
<?php get_footer(); ?>