<?php
/**
 * Template Name: Team (Index)
 * Description: The template for displaying the team members index page.
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
				
				<div class="team-members">
				
				<?php
				query_posts( array(
				    'post_type' => 'team',
				    'orderby' => 'menu_order',
				    'order' => 'ASC',
				    'posts_per_page' => -1
				) );
				?>
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
					<div class="one-third column">
						
						<div class="team-member">
						
							<div class="team-member-thumbnail">

								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'team-member-thumb' ); ?></a>
								
							</div><!-- end .team-member-thumbnail -->
							
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							
							<?php if ( get_post_meta( $post->ID, 'gt_member_role', true ) ) { ?>
							<p class="member-role"><?php _e( 'operating as', 'cabana' ); ?> <span><?php echo get_post_meta( $post->ID, 'gt_member_role', true ) ?></span></p>
							<?php } ?>
							
							<?php the_excerpt(); ?>
							
							<ul class="social-icons">
							
								<?php if ( get_post_meta( $post->ID, 'gt_member_twitter', true ) ) { ?>
									<li><a href="<?php echo get_post_meta( $post->ID, 'gt_member_twitter', true ) ?>" title="<?php _e( 'View Twitter Profile', 'cabana' ); ?>"><i class="fa fa-twitter"></i></a></li>
								<?php } if ( get_post_meta( $post->ID, 'gt_member_facebook', true ) ) { ?>
									<li><a href="<?php echo get_post_meta( $post->ID, 'gt_member_facebook', true ) ?>" title="<?php _e( 'View FaceBook Profile', 'cabana' ); ?>"><i class="fa fa-facebook"></i></a></li>
								<?php } if ( get_post_meta( $post->ID, 'gt_member_googleplus', true ) ) { ?>
									<li><a href="<?php echo get_post_meta( $post->ID, 'gt_member_googleplus', true ) ?>" title="<?php _e( 'View Google Plus Profile', 'cabana' ); ?>"><i class="fa fa-google-plus"></i></a></li>
								<?php } if ( get_post_meta( $post->ID, 'gt_member_linkedin', true ) ) { ?>
									<li><a href="<?php echo get_post_meta( $post->ID, 'gt_member_linkedin', true ) ?>" title="<?php _e( 'View Linkedin Profile', 'cabana' ); ?>"><i class="fa fa-linkedin"></i></a></li>
								<?php } if ( get_post_meta( $post->ID, 'gt_member_pinterest', true ) ) { ?>
									<li><a href="<?php echo get_post_meta( $post->ID, 'gt_member_pinterest', true ) ?>" title="<?php _e( 'View Pinterest Profile', 'cabana' ); ?>"><i class="fa fa-pinterest"></i></a></li>
								<?php } if ( get_post_meta( $post->ID, 'gt_member_dribbble', true ) ) { ?>
									<li><a href="<?php echo get_post_meta( $post->ID, 'gt_member_dribbble', true ) ?>" title="<?php _e( 'View Dribbble Profile', 'cabana' ); ?>"><i class="fa fa-dribbble"></i></a></li>
								<?php } if ( get_post_meta( $post->ID, 'gt_member_flickr', true ) ) { ?>
									<li><a href="<?php echo get_post_meta( $post->ID, 'gt_member_flickr', true ) ?>" title="<?php _e( 'View Flickr Profile', 'cabana' ); ?>"><i class="fa fa-flickr"></i></a></li>
								<?php } if ( get_post_meta( $post->ID, 'gt_member_instagram', true ) ) { ?>
									<li><a href="<?php echo get_post_meta( $post->ID, 'gt_member_instagram', true ) ?>" title="<?php _e( 'View Instagram Profile', 'cabana' ); ?>"><i class="fa fa-instagram"></i></a></li>
								<?php } if ( get_post_meta( $post->ID, 'gt_member_vimeo', true ) ) { ?>
									<li><a href="<?php echo get_post_meta( $post->ID, 'gt_member_vimeo', true ) ?>" title="<?php _e( 'View Vimeo Profile', 'cabana' ); ?>"><i class="fa fa-vimeo-square"></i></a></li>
								<?php } if ( get_post_meta( $post->ID, 'gt_member_youtube', true ) ) { ?>
									<li><a href="<?php echo get_post_meta( $post->ID, 'gt_member_youtube', true ) ?>" title="<?php _e( 'View YouTube Profile', 'cabana' ); ?>"><i class="fa fa-youtube"></i></a></li>
								<?php } ?>
							
							</ul><!-- end .social-icons -->
							
							<div class="clear"></div>
							
							<?php if ( get_post_meta( $post->ID, 'gt_member_readmore_button_text', true ) ) { ?>
							<a class="read-more-btn" href="<?php the_permalink(); ?>"><?php echo get_post_meta( $post->ID, 'gt_member_readmore_button_text', true ) ?></a>
							<?php } ?>
						
						</div><!-- end .team-member -->
						
					</div><!-- end .one-third -->
					
				<?php endwhile; endif; ?>
								
				</div><!-- end .team-members -->
						
			</div><!-- end .container -->
		
		</section><!-- end .content -->
					
	</main><!-- end main -->
	
<?php get_footer(); ?>