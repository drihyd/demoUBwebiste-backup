<?php global $cabana_wp; ?>
<?php get_template_part( 'partials/head', 'meta' ); ?>

<body <?php body_class(); ?> >

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  
	<header id="header-global-inner" role="banner">
	
		<div class="header-top-inner">

			<div class="container">
							
				<div class="translate"><?php echo do_shortcode('[google-translator]'); ?></div>
			
				<div class="logo four columns alpha">
				
					<?php if ( $cabana_wp['header-text-logo'] ) { ?>
						<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php } elseif ( $cabana_wp['header-logo'] ) { ?>
						<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo $cabana_wp['header-logo']['url']; ?>" alt="Header Logo" /></a></h1>
					<?php } ?>
					
				</div><!-- end .logo -->
         <div id="search_bar"><?php get_search_form(); ?></div> 
				
				<div class="twelve columns omega">
				
					<nav class="main-navigation" role="navigation">
					
					<?php if ( $cabana_wp['multi-one-page-chooser'] == '1' ) { ?>
					
					<?php
					$header_menu_args = array(
					    'menu' => 'Multi Navigation',
					    'theme_location' => 'Multi Header',
					    'container' => false,
					    'menu_id' => 'sf',
					    'menu_class' => 'sf-menu'
					);
					
					wp_nav_menu($header_menu_args);
					?>
					
					<?php } else { ?>
					
					<ul id="sf" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>"><?php _e( 'Back to home', 'cabana' ); ?></a></li>
					</ul>
					
					<?php } ?>
						
					</nav><!-- end .main-navigation -->
		
				</div><!-- end .twelve columns -->

			</div><!-- end .container -->
			
		</div><!-- end .header-top-inner -->
	
	</header><!-- end #header-global-inner -->