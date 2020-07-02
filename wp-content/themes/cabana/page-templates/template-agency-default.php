<?php
/**
 * Template Name: Homepage (Agency Default)
 * Description: The template for displaying the custom homepage.
 *
 *
 * @package cabana
 */
get_header(); ?>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<main>
	
		<?php
			$layout = $cabana_wp['homepage-blocks']['enabled'];
		if ( $layout ):
		foreach ( $layout as $key=>$value ) {
			switch( $key ) {
			case 'about-block':
		?>
	
		<section id="homepage-about">
		
			<div class="container">
			
				<header class="homepage-section-header">
				
					<div class="icon-holder about">
						<?php echo do_shortcode( stripslashes( $cabana_wp['about-icon'] ) ); ?>
					</div>
			
					<h1 style="width: 70%;"><?php echo $cabana_wp['about-title']; ?></h1>
					
					<div class="homepage-section-intro">
						
						<?php echo $cabana_wp['about-introduction']; ?>

					</div><!-- end .homepage-section-intro -->
					
					<?php if ( $cabana_wp['about-button-url-select'] ) { ?>
						<a class="read-more-btn" href="<?php echo get_permalink($cabana_wp['about-button-url-select']); ?>"><?php echo $cabana_wp['about-button-copy']; ?></a>
					<?php } ?>
          
          <a class="read-more-btn" href="http://uttamblastech.com/services/construction/">Excavation Solutions</a>
				 
				</header><!-- end .homepage-section-header -->
				
			</div><!-- end .container -->
		
		</section><!-- end #homepage-about -->
		
		<?php
		break;
		case 'work-block':
		?>
	
		<section id="homepage-portfolio">
		
			<div class="container">
		
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
				
					<div class="portfolio-items">
					
						<div class="one-third column">
						
							<div class="title-container">
								
								<h1><?php echo $cabana_wp['work-title']; ?></h1>
								<p><?php //echo $cabana_wp['work-subtitle']; ?></p>
								
								<?php if ( $cabana_wp['work-button-url-select'] ) { ?>
									<a class="read-more-btn" href="<?php echo get_permalink($cabana_wp['work-button-url-select']); ?>"><?php echo $cabana_wp['work-button-text']; ?></a>
								<?php } ?>

							</div><!-- end .title-container -->
							
						</div><!-- end .one-third -->
						
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
		
		</section><!-- end #homepage-portfolio -->
		
		<?php
		break;
		case 'quotes-block-top':
		?>
		
		<section class="homepage-quotes section-divider-1">
		
			<div class="bg1"></div>
		
			<div class="container">
			
				<div class="text-container">
				
					<ul class="quotes">
							
					<?php
					
					$args = array('post_type' => 'quotes', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => -1);
					$loop = new WP_Query($args);
					while ($loop->have_posts()) : $loop->the_post(); ?>
						
						<li>
							<i class="fa fa-quote-left"></i>
							<blockquote><p><?php echo get_post_meta($post->ID, 'gt_quotes_quote', true) ?></p></blockquote>
							<cite><?php echo get_post_meta($post->ID, 'gt_quotes_author', true) ?></cite>
						</li>
							
					<?php endwhile; ?>
			
					</ul><!-- end .quotes -->
				
				</div><!-- end .text-container -->	
		
			</div><!-- end .container -->
		
		</section><!-- end .homepage-quotes -->
		
		<?php
		break;
		case 'services-block':
		?>
		
		<section id="homepage-services">
				
			<div class="container">
			
				<div class="service-items">
					<h1><?php echo $cabana_wp['services-title']; ?></h1>
				
					<?php
					query_posts( array(
					    'post_type' => 'services',
					    'order' => 'DESC',
					    'posts_per_page' => $cabana_wp['service-items-select']
					) );
					?>
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
					<div class="one-half column">
						
						<a href="<?php echo get_post_meta( $post->ID, 'gt_service_url', true ) ?>">
              <div class="service-item">
							
							<div class="details">
								<?php echo do_shortcode( get_post_meta( $post->ID, 'gt_service_icon', $single = true ) ) ?>
								<h2><?php the_title(); ?></h2>
								<?php the_content(); ?>
							</div>
							
						</div><!-- end .service-item -->
           </a>
						
					</div><!-- end .one-third -->
					
					<?php endwhile; endif; ?>
			
				</div><!-- end .service-items -->
		
			</div><!-- end .container -->
		
		</section><!-- end #homepage-services -->
		
		<?php
		break;
		case 'tweet-block':
		?>
		
		<section class="homepage-tweet section-divider-2">
		
			<div class="bg2"></div>
			
			<div class="container">
				
				<div class="text-container">
				
					<i class="fa fa-twitter"></i>
		
					<div id="twitter-fetcher-tweet"></div>
					
					<?php if ( $cabana_wp['divider-twitter-profile'] ) { ?>
						<a class="read-more-btn" href="<?php echo $cabana_wp['divider-twitter-profile']; ?>"><?php _e( 'follow on Twitter', 'cabana' ); ?></a>
					<?php } ?>
					
				</div><!-- end .text-container -->
			
			</div><!-- end .container -->
		
		</section><!-- end .homepage-tweet -->
		
		<?php
		break;
		case 'team-block':
		?>
		
		<section id="homepage-team">
		
			<div class="container">
			
				<div class="row">
				
					<div class="team-members">
				
						<div class="one-third column">
										
							<div class="title-container">
							
								<h1><?php echo $cabana_wp['team-title']; ?></h1>
								<p><?php echo $cabana_wp['team-subtitle']; ?></p>
								
								<?php if ( $cabana_wp['team-button-url-select'] ) { ?>
									<a class="read-more-btn" href="<?php echo get_permalink($cabana_wp['team-button-url-select']); ?>"><?php echo $cabana_wp['team-button-text']; ?></a>
								<?php } ?>
	
							</div><!-- end .title-container -->
						
						</div><!-- end .one-third -->
						
						<?php
						query_posts( array(
						    'post_type' => 'team',
						    'orderby' => 'menu_order',
						    'order' => 'ASC',
						    'posts_per_page' => $cabana_wp['team-items-select']
						) );
						?>
						
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
						<div class="one-third column">
							
							<div class="team-member">
							
								<div class="team-image">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'team-member-thumb' ); ?>
										<div class="overlay">
											<div class="details">
												<h2><?php the_title(); ?></h2>
												<?php if ( get_post_meta( $post->ID, 'gt_member_role', true ) ) { ?>
												<p><?php _e( 'operating as', 'cabana' ); ?> <span><?php echo get_post_meta( $post->ID, 'gt_member_role', true ) ?></span></p>
												<?php } ?>
											</div>
										</div>
									</a>
								</div><!-- end .team-image -->
							
							</div><!-- end .team-member -->
							
						</div><!-- end .one-third -->
						
						<?php endwhile; endif; ?>
				
					</div><!-- end .team-members -->
				
				</div><!-- end .row -->
		
			</div><!-- end .container -->
		
		</section><!-- end #homepage-team -->
		
		<?php
		break;
		case 'quotes-block-bottom':
		?>
		
		<section class="homepage-quotes section-divider-3">
		
			<div class="bg3"></div>
		
			<div class="container">
			
				<div class="text-container">
									
					<ul class="quotes">
									
					<?php
					
					$args = array('post_type' => 'quotes', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => -1);
					$loop = new WP_Query($args);
					while ($loop->have_posts()) : $loop->the_post(); ?>
						
						<li>
							<i class="fa fa-quote-left"></i>
							<blockquote><p><?php echo get_post_meta($post->ID, 'gt_quotes_quote', true) ?></p></blockquote>
							<cite><?php echo get_post_meta($post->ID, 'gt_quotes_author', true) ?></cite>
						</li>
							
					<?php endwhile; ?>
			
					</ul><!-- end .quotes -->
				
				</div><!-- end .text-container -->	
		
			</div><!-- end .container -->
		
		</section><!-- end .homepage-quotes -->
		
		<?php
		break;
		case 'news-block':
		?>
		
		<section id="homepage-news">
			
			<div class="container">
			
				<div class="row">
				
					<div class="news-items">
						
						<div class="one-third column">
						
							<div class="title-container">
															
								<h1><?php echo $cabana_wp['news-title']; ?></h1>
								<p><?php echo $cabana_wp['news-subtitle']; ?></p>
								
								<?php if ( $cabana_wp['news-button-url-select'] ) { ?>
									<a class="read-more-btn" href="<?php echo get_permalink($cabana_wp['news-button-url-select']); ?>"><?php echo $cabana_wp['news-button-text']; ?></a>
								<?php } ?>
	
							</div><!-- end .title-container -->
						
						</div><!-- end .one-third -->
						
						<?php
						query_posts( array(
						    'post_type' => 'post',
						    'posts_per_page' => $cabana_wp['news-items-select']
						) );
						?>
						
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
						<div class="one-third column">
							
							<article class="news-item">
							
								<div class="news-image">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'news-thumb' ); ?>
										<div class="overlay">
											<div class="details">
												<h2><?php the_title(); ?></h2>
												<p><?php _e( 'posted on', 'cabana' ); ?> <span><?php the_time( 'F jS Y' ); ?></span></p>
											</div>
										</div>
									</a>
								</div><!-- end .news-image -->
							
							</article><!-- end .news-item -->
						
						</div><!-- end .one-third -->
						
						<?php endwhile; endif; ?>
										
					</div><!-- end .news-items -->
				
				</div><!-- end .row -->
			
			</div><!-- end .container -->
		
		</section><!-- end #homepage-news -->
		
		<?php
		break;
		case 'contact-block':
		?>
		
		<section id="homepage-contact">
				
			<div class="container">
		
				<div class="row">
				
					<div class="eight columns">
					
						<i class="fa fa-envelope"></i><h2 style="display: inline;color: #fff;padding-left: 15px;">Write To Us:</h2>
					
					<!-- 	<form class="contact-form" style="padding-top: 15px;" action="<?php //echo get_template_directory_uri(); ?>/form/form.php" method="post">
																	
							<input name="name" type="text" placeholder="<?php _e( 'Name', 'cabana' ); ?>">
							
						    <input name="email" type="email" placeholder="<?php _e( 'Email', 'cabana' ); ?>">
			
						    <textarea name="message" placeholder="<?php _e( 'Enquiry', 'cabana' ); ?>"></textarea>
						    
						    <p id="user">
						    <input name="username" type="text" placeholder="Your Username">
						    </p>
						            
						    <input id="submit" name="submit" type="submit" value="SEND">
						        
						</form>
						
						<div id="response"></div>
					 -->

						<?php echo do_shortcode( '[contact-form-7 id="2217" title="Write To Us"]' ); ?>

					</div>
					
					<div class="seven columns offset-by-one">
					
						<i class="fa fa-location-arrow"></i><h2 style="display: inline;color: #fff;padding-left: 15px;">Contact Us:</h2>
					
						<address class="contact-details">
						
							<ul>
							<?php if ( $cabana_wp['contact-address'] ) { ?>
								<li><?php echo $cabana_wp['contact-address']; ?></li>
							<?php } if ( $cabana_wp['contact-telephone'] ){ ?>
							    <li><?php echo $cabana_wp['contact-telephone']; ?></li>
							<?php } ?>
							<li><a href="mailto:<?php echo $cabana_wp['contact-email']; ?>"><?php echo $cabana_wp['contact-email']; ?></a></li>
							</ul>
						
						</address>
					
					</div>
				
				</div><!-- end .row -->
		
			</div><!-- end .container -->
		
		</section><!-- end #homepage-contact -->
		
		<!-- <script>
		jQuery(document).ready(function($) {
			"use strict";
		    var map;
		    map = new GMaps({
		        div: '#map',
		        lat: <?php echo $cabana_wp['map-latitude']; ?>,
		        lng: <?php echo $cabana_wp['map-longitude']; ?>,
		        scrollwheel: false, // Remove this line if you would like to enable zooming of the map via mousewheel/touchpad.
		        draggable: false, // Remove this line if you would like to enable dragging of the map via mouse/touchpad.
		        disableDefaultUI: true,
		    });
		    map.drawOverlay({
		        lat: map.getCenter().lat(),
		        lng: map.getCenter().lng(),
		        content: '<i class="fa fa-map-marker"></i>',
		        verticalAlign: 'top',
		        horizontalAlign: 'center'
		    });
		    // The styles below present your map in Monochrome. If you would like to use a normal coloured map with your theme, then please remove the code below.
		    var styles = [{
		        stylers: [{
		            hue: "#8A8E7D"
		        }, {
		            saturation: -60
		        }]
		    }, {
		        featureType: "road",
		        elementType: "geometry",
		        stylers: [{
		            lightness: 100
		        }, {
		            visibility: "simplified"
		        }]
		    }, {
		        featureType: "road",
		        elementType: "labels",
		        stylers: [{
		            visibility: "off"
		        }]
		    }];
		
		    map.setOptions({
		        styles: styles
		    });
		});
		</script> -->
		
		<div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3807.304042906138!2d78.50813531546383!3d17.397190588072686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb99a4d469f1bb%3A0x20e66b38249b3bca!2sUttam+-+Blasting+%26+Rock+Excavation+Experts%2C+Hyderabad!5e0!3m2!1sen!2sin!4v1534921097364" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe></div><!-- This is where your Google Map will be inserted (Please read the documentation about setting up your Google Map) -->
		
		<?php break; }
			} endif; ?>
					
	</main><!-- end main -->
	
<?php get_footer(); ?>