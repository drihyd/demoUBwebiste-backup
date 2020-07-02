<?php global $cabana_wp; ?>
<?php
/**
 * The sidebar containing the main widget areas.
 *
 * 
 * @package cabana
 */
?>

	<?php if ( is_page() ): ?>

		<?php if ( $cabana_wp['page-layout'] == '2' ) { ?>
			
		<aside class="sidebar five columns alpha">
		
			<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Page Sidebar' ) ) : else : ?>
			<?php endif; ?>
		
		</aside><!-- end .sidebar -->
		
		<?php } ?>
		
		<?php if ( $cabana_wp['page-layout'] == '3' ) { ?>
	
		<aside class="sidebar five columns offset-by-one omega">
	
			<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Page Sidebar' ) ) : else : ?>
			<?php endif; ?>
		
		</aside><!-- end .sidebar -->
		
		<?php } ?>
	
	<?php else: ?>
	
		<?php if ( $cabana_wp['blog-layout'] == '2' ) { ?>
			
		<aside class="sidebar five columns alpha">
		
			<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Blog Sidebar' ) ) : else : ?>
			<?php endif; ?>
		
		</aside><!-- end .sidebar -->
		
		<?php } ?>
		
		<?php if ( $cabana_wp['blog-layout'] == '3' ) { ?>
	
		<aside class="sidebar five columns offset-by-one omega">
	
			<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Blog Sidebar' ) ) : else : ?>
			<?php endif; ?>
		
		</aside><!-- end .sidebar -->
		
		<?php } ?>
	
	<?php endif; ?>