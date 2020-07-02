<?php global $cabana_wp; ?>

	<div class="social-links-container">
	
		<ul class="social-links">
		<?php if ( $cabana_wp['social-twitter'] ) { ?>
			<li><a href="<?php echo $cabana_wp['social-twitter']; ?>" title="<?php _e( 'View Twitter Profile', 'cabana' ); ?>" target="_blank"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a></li>
		<?php } if ( $cabana_wp['social-facebook'] ) { ?>
			<li><a href="<?php echo $cabana_wp['social-facebook']; ?>" title="<?php _e( 'View Facebook Profile', 'cabana' ); ?>" target="_blank"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a></li>
		<?php } if ( $cabana_wp['social-linkedin'] ) { ?>
			<li><a href="<?php echo $cabana_wp['social-linkedin']; ?>" title="<?php _e( 'View Linkedin Profile', 'cabana' ); ?>" target="_blank"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a></li>
		<?php } if ( $cabana_wp['social-pinterest'] ) { ?>
			<li><a href="<?php echo $cabana_wp['social-pinterest']; ?>" title="<?php _e( 'View Pinterest Profile', 'cabana' ); ?>" target="_blank">Pinterest</a></li>
		<?php } if ( $cabana_wp['social-googleplus'] ) { ?>
			<li><a href="<?php echo $cabana_wp['social-googleplus']; ?>" title="<?php _e( 'View Google Plus Profile', 'cabana' ); ?>" target="_blank">Google +</a></li>
		<?php } if ( $cabana_wp['social-flickr'] ) { ?>
			<li><a href="<?php echo $cabana_wp['social-flickr']; ?>" title="<?php _e( 'View Flickr Profile', 'cabana' ); ?>" target="_blank">Flickr</a></li>
		<?php } if ( $cabana_wp['social-instagram'] ) { ?>
			<li><a href="<?php echo $cabana_wp['social-instagram']; ?>" title="<?php _e( 'View Instagram Profile', 'cabana' ); ?>" target="_blank">Instagram</a></li>
		<?php } if ( $cabana_wp['social-dribbble'] ) { ?>
			<li><a href="<?php echo $cabana_wp['social-dribbble']; ?>" title="<?php _e( 'View Dribbble Profile', 'cabana' ); ?>" target="_blank">Dribbble</a></li>
		<?php } if ( $cabana_wp['social-youtube'] ) { ?>
			<li><a href="<?php echo $cabana_wp['social-youtube']; ?>" title="<?php _e( 'View YouTube Profile', 'cabana' ); ?>" target="_blank">YouTube</a></li>
		<?php } if ( $cabana_wp['social-vimeo'] ) { ?>
			<li><a href="<?php echo $cabana_wp['social-vimeo']; ?>" title="<?php _e( 'View Vimeo Profile', 'cabana' ); ?>" target="_blank">Vimeo</a></li>
		<?php } ?>	
		</ul><!-- end .social-links -->
			
	</div><!-- end .social-links-container -->