<?php global $cabana_wp; ?>
<?php get_template_part( 'partials/head', 'meta' ); ?>
<body <?php body_class(); ?> >

	<?php if ( is_page_template( 'page-templates/template-agency-default.php' ) ) : ?>
  

    <div class="header-image-slideshow"></div>

	<header id="header-global" role="banner">
	
		<div class="header-top">
				
			<div class="container">
        
        <div class="translate"><?php echo do_shortcode('[google-translator]'); ?></div>        
			
				<nav class="main-navigation" role="navigation">
				
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
					
				</nav><!-- end .main-navigation -->
        
					
				<div class="logo">
				
					<?php if ( $cabana_wp['header-text-logo'] ) { ?>
						<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php } elseif ( $cabana_wp['header-logo'] ) { ?>
						<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo $cabana_wp['header-logo']['url']; ?>" alt="Header Logo" /></a></h1>
					<?php } ?>
					
				</div><!-- end .logo -->
        <div id="search_bar"><?php get_search_form(); ?></div> 
				
				<?php get_template_part( 'partials/uber', 'social' ); 
        ?>
			
			</div><!-- end .container -->
			
		</div><!-- end .header-top -->
		
	<?php elseif ( is_page_template( 'page-templates/template-portfolio-showcase.php' ) ) : ?>
	
	<header id="header-global" role="banner">
	
		<div class="header-top">
				
			<div class="container">
				
				<nav class="main-navigation" role="navigation">
				
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
					
				</nav><!-- end .main-navigation -->
							
				<div class="logo">
				
					<?php if ( $cabana_wp['header-text-logo'] ) { ?>
						<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php } elseif ( $cabana_wp['header-logo'] ) { ?>
						<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo $cabana_wp['header-logo']['url']; ?>" alt="Header Logo" /></a></h1>
					<?php } ?>
					
				</div><!-- end .logo -->
				
				<?php get_template_part( 'partials/uber', 'social' ); ?>
				
			</div><!-- end .container -->
			
		</div><!-- end .header-top -->
	
	</header><!-- end #header-global -->
	
	<?php elseif ( is_page_template( 'page-templates/template-blog-style.php' ) ) : ?>
	
	<div class="header-image-slideshow"></div>
	
	<header id="header-global" role="banner">
	
		<div class="header-top">
				
			<div class="container">
				
				<div class="logo four columns alpha">
				
					<?php if ( $cabana_wp['header-text-logo'] ) { ?>
						<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php } elseif ( $cabana_wp['header-logo'] ) { ?>
						<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo $cabana_wp['header-logo']['url']; ?>" alt="Header Logo" /></a></h1>
					<?php } ?>
					
				</div><!-- end .logo -->
				
				<div class="twelve columns omega">
				
					<nav class="main-navigation" role="navigation">
					
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
						
					</nav><!-- end .main-navigation -->
		
				</div><!-- end .twelve columns -->
										
			</div><!-- end .container -->
			
		</div><!-- end .header-top -->
		
		<?php get_template_part( 'partials/uber', 'social' ); ?>
	
	<?php else : ?>

	<div class="header-image-slideshow"></div>
   
	
	<header id="header-global" role="banner">
	
		<div class="header-top">
				
			<div class="container">
				
				<div class="logo four columns alpha">
				
					<?php if ( $cabana_wp['header-text-logo'] ) { ?>
						<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php } elseif ( $cabana_wp['header-logo'] ) { ?>
						<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo $cabana_wp['header-logo']['url']; ?>" alt="Header Logo" /></a></h1>
					<?php } ?>
					
				</div><!-- end .logo -->
				
				<div class="twelve columns omega">
				
					<nav class="main-navigation" role="navigation">
	
					<?php if ( !is_page_template( 'page-templates/template-one-page-team.php' ) && !is_page_template( 'page-templates/template-one-page-personal.php' ) ) { ?>
					
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
					
					<?php
					$header_menu_args = array(
					    'menu' => 'One Page Navigation',
					    'theme_location' => 'One Header',
					    'container' => false,
					    'menu_id' => 'sf',
					    'menu_class' => 'sf-menu'
					);
					
					wp_nav_menu($header_menu_args);
					?>
					
					<?php } ?>
						
					</nav><!-- end .main-navigation -->
		
				</div><!-- end .twelve columns -->
										
			</div><!-- end .container -->
			
		</div><!-- end .header-top -->

		<?php get_template_part( 'partials/uber', 'social' ); ?>
    
	
	<?php endif; ?>
	
	</header><!-- end #header-global -->