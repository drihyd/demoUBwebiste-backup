<?php global $cabana_wp; ?>
	
	<ul class="social-icons">
	<?php if ( $cabana_wp['social-twitter'] ) { ?>
		<li><a href="<?php echo $cabana_wp['social-twitter']; ?>" title="<?php _e( 'View Twitter Profile', 'cabana' ); ?>"><i class="fa fa-twitter"></i></a></li>
	<?php } if ( $cabana_wp['social-facebook'] ) { ?>
		<li><a href="<?php echo $cabana_wp['social-facebook']; ?>" title="<?php _e( 'View Facebook Profile', 'cabana' ); ?>"><i class="fa fa-facebook"></i></a></li>
	<?php } if ( $cabana_wp['social-linkedin'] ) { ?>
		<li><a href="<?php echo $cabana_wp['social-linkedin']; ?>" title="<?php _e( 'View Linkedin Profile', 'cabana' ); ?>"><i class="fa fa-linkedin"></i></a></li>
	<?php } if ( $cabana_wp['social-pinterest'] ) { ?>
		<li><a href="<?php echo $cabana_wp['social-pinterest']; ?>" title="<?php _e( 'View Pinterest Profile', 'cabana' ); ?>"><i class="fa fa-pinterest"></i></a></li>
	<?php } if ( $cabana_wp['social-googleplus'] ) { ?>
		<li><a href="<?php echo $cabana_wp['social-googleplus']; ?>" title="<?php _e( 'View Google Plus Profile', 'cabana' ); ?>"><i class="fa fa-google-plus"></i></a></li>
	<?php } if ( $cabana_wp['social-flickr'] ) { ?>
		<li><a href="<?php echo $cabana_wp['social-flickr']; ?>" title="<?php _e( 'View Flickr Profile', 'cabana' ); ?>"><i class="fa fa-flickr"></i></a></li>
	<?php } if ( $cabana_wp['social-instagram'] ) { ?>
		<li><a href="<?php echo $cabana_wp['social-instagram']; ?>" title="<?php _e( 'View Instagram Profile', 'cabana' ); ?>"><i class="fa fa-instagram"></i></a></li>
	<?php } if ( $cabana_wp['social-dribbble'] ) { ?>
		<li><a href="<?php echo $cabana_wp['social-dribbble']; ?>" title="<?php _e( 'View Dribbble Profile', 'cabana' ); ?>"><i class="fa fa-dribbble"></i></a></li>
	<?php } if ( $cabana_wp['social-youtube'] ) { ?>
		<li><a href="<?php echo $cabana_wp['social-youtube']; ?>" title="<?php _e( 'View YouTube Profile', 'cabana' ); ?>"><i class="fa fa-youtube-square"></i></a></li>
	<?php } if ( $cabana_wp['social-vimeo'] ) { ?>
		<li><a href="<?php echo $cabana_wp['social-vimeo']; ?>" title="<?php _e( 'View Vimeo Profile', 'cabana' ); ?>"><i class="fa fa-vimeo-square"></i></a></li>
	<?php } ?>
	</ul><!-- end .social-icons -->