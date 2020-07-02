<?php
/**
 * The template for displaying single team member profiles.
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
				
				<div class="about-profile">
						
					<div class="eight columns alpha">
						
						<?php the_post_thumbnail('team-member-thumb'); ?>
								
					</div>
						
					<div class="seven columns offset-by-one omega">
					
						<ul class="about-profile-list">

							<?php if ( get_post_meta($post->ID, 'gt_member_overview_skills_list', true ) ) { ?>
							<li><?php _e( 'My Skills', 'cabana' ); ?> - <span><?php echo get_post_meta( $post->ID, 'gt_member_overview_skills_list', true ) ?></span></li>
							<?php } if ( get_post_meta( $post->ID, 'gt_member_overview_equipment_list', true ) ) { ?>
							<li><?php _e( 'My Equipment', 'cabana' ); ?> - <span><?php echo get_post_meta( $post->ID, 'gt_member_overview_equipment_list', true ) ?></span></li>
							<?php } if ( get_post_meta( $post->ID, 'gt_member_overview_likes_list', true ) ) { ?>
							<li><?php _e( 'My Likes', 'cabana' ); ?> - <span><?php echo get_post_meta( $post->ID, 'gt_member_overview_likes_list', true ) ?></span></li>
							<?php } if ( get_post_meta( $post->ID, 'gt_member_overview_dislikes_list', true ) ) { ?>
							<li><?php _e( 'My Dislikes', 'cabana' ); ?> - <span><?php echo get_post_meta( $post->ID, 'gt_member_overview_dislikes_list', true ) ?></span></li>
							<?php } ?>
						</ul><!-- end .about-profile-list -->
						
						<?php if ( get_post_meta( $post->ID, 'gt_member_email_address', true ) ) { ?>
						<a class="contact-btn" href="mailto:<?php echo get_post_meta( $post->ID, 'gt_member_email_address', true ) ?>"><?php echo get_post_meta( $post->ID, 'gt_member_email_button_text', true ) ?></a>
						<?php } ?>
					
					</div>
					
				</div><!-- end .about-profile -->
														
			</div><!-- end .container -->
		
		</section><!-- end .content -->
					
	</main><!-- end main -->
	
<?php get_footer(); ?>