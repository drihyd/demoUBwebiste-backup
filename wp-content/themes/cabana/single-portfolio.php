<?php
/**
 * The template for displaying single portfolio items.
 *
 *
 * @package cabana
 */
get_header( 'inner' ); ?>

	<main>
	
		<section class="content inner">
					
			<div class="container">
			
				<?php $mediaType = get_post_meta( $post->ID, 'gt_project_type', true ); ?>
			
				<?php
				switch ( $mediaType ) {
				    case 'Images':
				    	echo '<section class="single-project standard">';
				        break;
				    
				    case 'Slideshow':
				        echo '<section class="single-project slideshow">';
				        break;
				    
				    case 'Video':
				        echo '<section class="single-project video">';
				        break;
				            
				    case 'Audio':
				        echo '<section class="single-project audio">';
				    
				    default:
				        break;
				}
				?>
					
					<ul class="project-nav">
						
						<li class="previous-link"><?php next_post_link( '%link', '< prev' ); ?></li>
						<li class="back-link"><a href="<?php echo home_url(); ?>"><?php _e( 'back', 'cabana' ); ?></a></li>
						<li class="next-link"><?php previous_post_link( '%link', 'next >' ); ?></li>
					</ul><!-- end .project-nav -->
					
					<div class="clear"></div>
					
					<?php
					switch ( $mediaType ) {
					    case 'Images':
					    	echo '<div class="ten columns alpha">';
					        gt_image( $post->ID, 'feature-image' );
					        echo '</div>';
					        break;
					    
					    case 'Slideshow':
					        gt_gallery( $post->ID, 'slideshow' );
					        break;
					    
					    case 'Video':
					        $embed = get_post_meta( $post->ID, 'gt_video_embed_code', true );
					        if ( !empty( $embed ) ) {
					            echo '<div class="video-frame">';
					            echo stripslashes( htmlspecialchars_decode( $embed ) );
					            echo '</div>';
					            break;
					        }
					            
					    case 'Audio':
					        $embed = get_post_meta( $post->ID, 'gt_audio_embed_code', true );
					        if ( !empty( $embed ) ) {
					            echo '<div class="audio-frame">';
					            echo stripslashes( htmlspecialchars_decode( $embed ) );
					            echo '</div>';
					        
					        }
					    
					    default:
					        break;
					}
					?>
					
					<?php if ( 'Images' == get_post_meta( $post->ID, 'gt_project_type', true ) ) { ?>
					  
					<div class="row">
					  			
	  					<div class="five columns offset-by-one omega">
	  					
	  						<div class="project-icons">
	  							<?php echo do_shortcode( get_post_meta( $post->ID, 'gt_project_icons', true ) ) ?>
	  						</div>
	  					
	  						<h1><?php the_title(); ?></h1>
	  						
	  						<p class="client-name"><?php _e( 'developed for', 'cabana' ); ?> <span><?php echo get_post_meta( $post->ID, 'gt_client_name', true ) ?></span></p>
	  				
	  						<div class="project-description">
	  						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  							
	  							<?php the_content(); ?>
	  							
	  						<?php endwhile; endif; ?>
	  						</div><!-- end .project-description -->
	  						
	  						<ul class="project-details">
	  							<?php if ( get_post_meta($post->ID, 'gt_client_name', true ) ) { ?>
	  							<li><?php _e( 'Client', 'cabana' ); ?> - <span><?php echo get_post_meta( $post->ID, 'gt_client_name', true ) ?></span></li>
	  							<?php } ?>
	  							<?php if ( get_post_meta( $post->ID, 'gt_project_date', true ) ) { ?>
	  							<li><?php _e( 'Date Completed', 'cabana' ); ?> - <span><?php echo get_post_meta( $post->ID, 'gt_project_date', true ) ?></span></li>
	  							<?php } ?>
	  							
	  							<?php if ( get_post_meta( $post->ID, 'gt_project_checklist', true ) ) { ?>
	  							<li><?php _e( 'Skills/Tools Used', 'cabana' ); ?> -
	  							<?php $figures = explode( '.',get_post_meta( $post->ID, 'gt_project_checklist', true ) );
	  							     if( $figures ) {
	  							         foreach ( $figures as $figure ) { ?>
	  								<span><?php echo $figure; ?></span>
	  								<?php }
	  							} ?>
	  							</li>
	  							<?php } ?>
	  						</ul><!-- end .project-details -->
	  						
	  						<?php if ( get_post_meta( $post->ID, 'gt_project_url', true ) ) { ?>
	  						<a class="read-more-btn" href="<?php echo get_post_meta( $post->ID, 'gt_project_url', true ) ?>"><?php _e( 'View project', 'cabana' ); ?></a>
	  						<?php } ?>
	  					
	  					</div><!-- end .five columns -->
	  
	  				</div><!-- end .row -->
					  				
					<?php } elseif ( 'Slideshow' || 'Video' || 'Audio' == get_post_meta( $post->ID, 'gt_project_type', true ) ) { ?>
					  
					<div class="row">
					  			
	  					<div class="ten columns alpha">
	  					
	  						<h1><?php the_title(); ?></h1>
	  						
	  						<p class="client-name"><?php _e( 'developed for', 'cabana' ); ?> <span><?php echo get_post_meta( $post->ID, 'gt_client_name', true ) ?></span></p>
	  					
	  						<div class="project-description">
	  						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  							
	  							<?php the_content(); ?>
	  							
	  						<?php endwhile; endif; ?>
	  						</div><!-- end .project-description -->
	  						
	  					</div><!-- end .ten columns -->
	  					
	  					<div class="five columns offset-by-one omega">
	  					
	  						<div class="project-icons">
	  							<?php echo do_shortcode( get_post_meta( $post->ID, 'gt_project_icons', true ) ) ?>
	  						</div>
	  						
	  						<ul class="project-details">
	  							<?php if ( get_post_meta($post->ID, 'gt_client_name', true ) ) { ?>
	  							<li><?php _e( 'Client', 'cabana' ); ?> - <span><?php echo get_post_meta( $post->ID, 'gt_client_name', true ) ?></span></li>
	  							<?php } ?>
	  							<?php if ( get_post_meta( $post->ID, 'gt_project_date', true ) ) { ?>
	  							<li><?php _e( 'Date Completed', 'cabana' ); ?> - <span><?php echo get_post_meta( $post->ID, 'gt_project_date', true ) ?></span></li>
	  							<?php } ?>
	  							
	  							<?php if ( get_post_meta( $post->ID, 'gt_project_checklist', true ) ) { ?>
	  							<li><?php _e( 'Skills/Tools Used', 'cabana' ); ?> -
	  							<?php $figures = explode( '.',get_post_meta( $post->ID, 'gt_project_checklist', true ) );
	  							     if( $figures ) {
	  							         foreach ( $figures as $figure ) { ?>
	  								<span><?php echo $figure; ?></span>
	  								<?php }
	  							} ?>
	  							</li>
	  							<?php } ?>
	  						</ul><!-- end .project-details -->
	  						
	  						<?php if ( get_post_meta( $post->ID, 'gt_project_url', true ) ) { ?>
	  						<a class="read-more-btn" href="<?php echo get_post_meta( $post->ID, 'gt_project_url', true ) ?>"><?php _e( 'View project', 'cabana' ); ?></a>
	  						<?php } ?>
	  					
	  					</div><!-- end .five columns -->
	  
	  				</div><!-- end .row -->
					
					<?php } ?>

				</section><!-- end .single-project -->
						
			</div><!-- end .container -->
				
		</section><!-- end .content -->
							
	</main><!-- end main -->

<?php get_footer(); ?>