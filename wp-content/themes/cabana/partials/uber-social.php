<?php global $cabana_wp; ?>
<div class="container">

	<?php if ( is_page_template( 'page-templates/template-portfolio-showcase.php' ) ) : ?>
	
	<div class="uber-statement">
		
		<h2><?php echo $cabana_wp['uber-statement']; ?></h2>
	
	</div><!-- end .uber-statement -->
	
	<?php //get_template_part( 'partials/social', 'icons' ); 
  ?>
	
	<?php elseif ( !is_page_template( 'page-templates/template-one-page-team.php' ) && !is_page_template( 'page-templates/template-one-page-personal.php' ) && !is_page_template( 'page-templates/template-agency-alt.php' ) ) : ?>
	
	<div class="uber-statement">
		
		<h2><?php echo $cabana_wp['uber-statement']; ?></h2>
	
	</div><!-- end .uber-statement -->
	
	<?php //get_template_part( 'partials/social', 'links' ); 
  ?>

	<?php else : ?>
	
	<?php //get_template_part( 'partials/social', 'icons' ); 
  ?>
	
	<div class="uber-statement">
		
		<h2><?php echo $cabana_wp['uber-statement']; ?></h2>
	
	</div><!-- end .uber-statement -->
	
	<?php if ( $cabana_wp['uber-button-url-select-page'] ) { ?>
		<a class="read-more-btn-uber" href="<?php echo get_permalink($cabana_wp['uber-button-url-select-page']); ?>"><?php echo $cabana_wp['uber-statement-button-text']; ?></a>
	<?php } elseif ( $cabana_wp['uber-button-url-select-section'] ) { ?>
		<a id="uber-scroll-to" class="read-more-btn-uber" href="<?php echo $cabana_wp['uber-button-url-select-section']; ?>"><?php echo $cabana_wp['uber-statement-button-text']; ?></a>
	<?php } ?>
	
	<?php endif; ?>

</div><!-- end. container -->