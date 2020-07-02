<?php
/**
 * Template Name: Contact
 * Description: The template for displaying the contact page.
 *
 *
 * @package cabana
 */
get_header( 'inner' ); ?>

	<main>
	
		<section class="content">
		
			<script>
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
			</script>
				
			<div id="map"></div><!-- This is where your Google Map will be inserted (Please read the docs about setting up your Google Map) -->
			
			<div class="container">
			
				<div class="nine columns alpha">
				
					<h1><?php the_title(); ?></h1>
							
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								
						<?php the_content(); ?>
						
					<?php endwhile; endif; ?>
					
					<form class="contact-form-standard" action="<?php echo get_template_directory_uri(); ?>/form/form.php" method="post">
										
						<input name="name" type="text" placeholder="<?php _e( 'Your Name (required)', 'cabana' ); ?>">
		
					    <input name="email" type="email" placeholder="<?php _e( 'Your Email (required)', 'cabana' ); ?>">
		
					    <textarea name="message" placeholder="<?php _e( 'Please enter your message...', 'cabana' ); ?>"></textarea>
					    
					    <p id="user">
					    <input name="username" type="text" placeholder="Your Username">
					    </p>
					            
					    <input id="submit" name="submit" type="submit" value="Submit">
					        
					</form><!-- end .contact-form-standard -->
					
					<div id="response"></div>
					
				</div>
				
				<div class="six columns offset-by-one omega">
				
					<div class="contact-info">
				
					<?php if ( $cabana_wp['contact-title'] ) { ?>
						<h2><?php echo $cabana_wp['contact-title']; ?></h2>
					<?php } ?>
						
						<address class="contact-details-standard">
						    
						    <ul>
						    <?php if ( $cabana_wp['contact-address'] ) { ?>
						    	<li><?php echo $cabana_wp['contact-address']; ?></li>
						    <?php } if ( $cabana_wp['contact-telephone'] ){ ?>
						        <li><?php _e( 'Tel:', 'cabana' ); ?> <?php echo $cabana_wp['contact-telephone']; ?></li>
						    <?php } if ( $cabana_wp['contact-mobile'] ){ ?>
						        <li><?php _e( 'Mob:', 'cabana' ); ?> <?php echo $cabana_wp['contact-mobile']; ?></li>
						    <?php } ?>
						    </ul>
						
						</address>
						
						<?php if ( $cabana_wp['contact-email'] ) { ?>
							<a class="contact-btn" href="mailto:<?php echo $cabana_wp['contact-email']; ?>"><?php echo $cabana_wp['contact-email']; ?></a>
						<?php } ?>
					
					</div><!-- end .contact-info -->
				
				</div>
			
			</div><!-- end .container -->
		
		</section><!-- end .content -->
					
	</main><!-- end main -->
	
<?php get_footer(); ?>