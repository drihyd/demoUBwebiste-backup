<?php
/**
 * The sidebar containing the shop widget area.
 *
 * 
 * @package cabana
 */
?>

		<aside class="sidebar four columns offset-by-one omega">
		
			<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Shop Sidebar' ) ) : else : ?>
			<?php endif; ?>
			
		</aside><!-- end .sidebar -->